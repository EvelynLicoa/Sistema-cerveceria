<?php


    
    $num_comprobante =  isset($_POST['num_comprobante']) ? $_POST['num_comprobante'] : ""; 
    $dia =  isset($_POST['dia']) ? $_POST['dia'] : "";       
    $clientes_id =  isset($_POST['clientes_id']) ? $_POST['clientes_id'] : "";    
    $pto_vta=  isset($_POST['pto_vta']) ? $_POST['pto_vta'] : "";  
    $tipos_comprobantes_id =  isset($_POST['tipos_comprobantes_id']) ? $_POST['tipos_comprobantes_id'] : "";
    $cliente_sit_iva=  isset($_POST['cliente_sit_iva']) ? $_POST['cliente_sit_iva'] : "";
    $condicion_venta_id =  isset($_POST['condicion_venta_id']) ? $_POST['condicion_venta_id'] : "";


    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn->prepare('INSERT INTO encabezado_pie (dia, clientes_id, num_comprobante, pto_vta, tipos_comprobantes_id, cliente_sit_iva, condicion_venta_id) VALUES (:dia, :clientes_id, :num_comprobante, :pto_vta, :tipos_comprobantes_id, :cliente_sit_iva, :condicion_venta_id)');
            $stament->bindParam(':dia', $dia);
            $stament->bindParam(':clientes_id', $clientes_id);
            $stament->bindParam(':num_comprobante', $num_comprobante);
            $stament->bindParam(':pto_vta', $pto_vta);
            $stament->bindParam(':tipos_comprobantes_id', $tipos_comprobantes_id);
            $stament->bindParam(':cliente_sit_iva', $cliente_sit_iva);
            $stament->bindParam(':condicion_venta_id', $condicion_venta_id);
            $stament->execute();
            $stament = null;
            
            
            //    ----------------------------------------------------------------------------------------
    
    $conn2 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
            $stament = $conn2->prepare("UPDATE ultimos_comprobantes SET ult_num=:ult_num, ult_fecha=:ult_fecha WHERE ultimos_comprobantes.pto_venta=:pto_venta AND ultimos_comprobantes.tipos_comprobantes_id=:tipos_comprobantes_id");
            $stament->bindParam(':ult_num', $num_comprobante);
            $stament->bindParam(':ult_fecha', $dia);
            $stament->bindParam(':pto_venta', $pto_vta);
            $stament->bindParam(':tipos_comprobantes_id', $tipos_comprobantes_id);
            echo $stament->execute();
            $stament = null;
            
            

?>






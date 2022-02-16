<?php

    $pto_venta =  isset($_POST['pto_venta']) ? $_POST['pto_venta'] : ""; 

    $tipos_comprobantes_id = isset($_POST['tipo_comprobante']) ? $_POST['tipo_comprobante'] : ""; ; 




    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
       $stament = $conn->prepare("SELECT ultimos_comprobantes.ult_fecha AS ult_fecha FROM ultimos_comprobantes WHERE ultimos_comprobantes.pto_venta=:pto_venta AND ultimos_comprobantes.tipos_comprobantes_id=:tipos_comprobantes_id");
       $stament->bindParam(':pto_venta', $pto_venta);
       $stament->bindParam(':tipos_comprobantes_id', $tipos_comprobantes_id);
       $stament->execute();

       $res = $stament->fetch();

       $fecha = $res['ult_fecha'];

//       $setFecha = date("Y-m-d",strtotime($fecha."+ 1 days")); 

       echo json_encode($fecha);
       
       $conn = null; 

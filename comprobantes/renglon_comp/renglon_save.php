<?php
//    session_start();
    

    function insertVentas(){
        
        $id_sw =  isset($_POST['id_sw']) ? $_POST['id_sw'] : ""; 

        $cliente_id =  isset($_POST['cliente_id']) ? $_POST['cliente_id'] : ""; 

        $lotes_id =  isset($_POST['lotes_id']) ? $_POST['lotes_id'] : "";     

        $barriles_id =  isset($_POST['barriles_id']) ? $_POST['barriles_id'] : ""; 

        $fecha_entrega =  isset($_POST['fecha_entrega']) ? $_POST['fecha_entrega'] : "";

        $fecha_devolucion =  isset($_POST['fecha_devolucion']) ? $_POST['fecha_devolucion'] : "";  

        $monto_total =  isset($_POST['monto_total']) ? $_POST['monto_total'] : "";

        $monto_pagado =  isset($_POST['monto_pagado']) ? $_POST['monto_pagado'] : "";

        $tipo_pago =  isset($_POST['tipo_pago']) ? $_POST['tipo_pago'] : "";

        $entregado =  isset($_POST['entregado']) ? $_POST['entregado'] : "";


    //    $EsteSubtotal = str_replace(',', "", $subtotal);

        $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
        $stament = $conn->prepare('INSERT INTO ventas (id_sw, cliente_id, lotes_id, barriles_id, fecha_entrega, fecha_devolucion, monto_total, monto_pagado, tipo_pago, entregado) VALUES (:id_sw, :cliente_id, :lotes_id, :barriles_id, :fecha_entrega, :fecha_devolucion, :monto_total, :monto_pagado, :tipo_pago, :entregado)');
        $stament->bindParam(':id_sw', $id_sw);
        $stament->bindParam(':cliente_id', $cliente_id);
        $stament->bindParam(':lotes_id', $lotes_id);
        $stament->bindParam(':barriles_id', $barriles_id);
        $stament->bindParam(':fecha_entrega', $fecha_entrega);
        $stament->bindParam(':fecha_devolucion', $fecha_devolucion);
        $stament->bindParam(':monto_total', $monto_total);
        $stament->bindParam(':monto_pagado', $monto_pagado);
        $stament->bindParam(':tipo_pago', $tipo_pago);
        $stament->bindParam(':entregado', $entregado);
        return $stament->execute();
        $stament = null;
//        return json_encode($id_sw);
}
    
    
    echo insertVentas(); 
?>






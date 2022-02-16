<?php
    session_start();
    

    
    $id_sw =  isset($_GET['id_sw']) ? $_GET['id_sw'] : ""; 
    
    $cliente_id =  isset($_GET['cliente_id']) ? $_GET['cliente_id'] : ""; 
    
    $lotes_id =  isset($_GET['lotes_id']) ? $_GET['lotes_id'] : "";     
    
    $barriles_id =  isset($_GET['barriles_id']) ? $_GET['barriles_id'] : ""; 
    
    $fecha_entrega =  isset($_GET['fecha_entrega']) ? $_GET['fecha_entrega'] : "";
    
    $fecha_devolucion =  isset($_GET['fecha_devolucion']) ? $_GET['fecha_devolucion'] : "";  
    
    $monto_total =  isset($_GET['monto_total']) ? $_GET['monto_total'] : "";
    
    $monto_pagado =  isset($_GET['monto_pagado']) ? $_GET['monto_pagado'] : "";
    
    $tipo_pago =  isset($_GET['tipo_pago']) ? $_GET['tipo_pago'] : "";
    
    $entregado =  isset($_GET['entregado']) ? $_GET['entregado'] : "";
    
    
//    $EsteSubtotal = str_replace(',', "", $subtotal);

//    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
//    $stament = $conn->prepare('INSERT INTO ventas (id_sw, cliente_id, lotes_id, barriles_id, fecha_entrega, fecha_devolucion, monto_total, monto_pagado, tipo_pago, entregado) VALUES (:id_sw, :cliente_id, :lotes_id, :barriles_id, :fecha_entrega, :fecha_devolucion, :monto_total, :monto_pagado, :tipo_pago, :entregado)');
//    $stament->bindParam(':id_sw', $id_sw);
//    $stament->bindParam(':cliente_id', $cliente_id);
//    $stament->bindParam(':lotes_id', $lotes_id);
//    $stament->bindParam(':barriles_id', $barriles_id);
//    $stament->bindParam(':fecha_entrega', $fecha_entrega);
//    $stament->bindParam(':fecha_devolucion', $fecha_devolucion);
//    $stament->bindParam(':monto_total', $monto_total);
//    $stament->bindParam(':monto_pagado', $monto_pagado);
//    $stament->bindParam(':tipo_pago', $tipo_pago);
//    $stament->bindParam(':entregado', $entregado);
//    echo $stament->execute();
//    $stament = null;
    
    echo $id_sw;
?>






<?php

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
        
    $insumos_id =  isset($_POST['insumos_id']) ? $_POST['insumos_id'] : "";
    
    $fecha_solicitud =  isset($_POST['fecha_solicitud']) ? $_POST['fecha_solicitud'] : "";
    
    $fecha_recibo =  isset($_POST['fecha_recibo']) ? $_POST['fecha_recibo'] : "";
    
    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
    
    $monto =  isset($_POST['monto']) ? $_POST['monto'] : "";



   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('UPDATE compras_insumos SET insumos_id=:insumos_id, fecha_solicitud=:fecha_solicitud, fecha_recibo=:fecha_recibo, cantidad=:cantidad, monto=:monto WHERE id=:id');
   $stament->bindParam(':insumos_id', $insumos_id);
   $stament->bindParam(':fecha_solicitud', $fecha_solicitud);
   $stament->bindParam(':fecha_recibo', $fecha_recibo);
   $stament->bindParam(':cantidad', $cantidad);
   $stament->bindParam(':monto', $monto);
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
    
    
?>


<?php


 
    $insumos_id =  isset($_POST['insumos_id']) ? $_POST['insumos_id'] : "";
    
    $fecha_solicitud =  isset($_POST['fecha_solicitud']) ? $_POST['fecha_solicitud'] : "";
    
    $fecha_recibo =  isset($_POST['fecha_recibo']) ? $_POST['fecha_recibo'] : "";
    
    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
    
    $monto =  isset($_POST['monto']) ? $_POST['monto'] : "";
    

  

   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('INSERT INTO compras_insumos (insumos_id, fecha_solicitud, fecha_recibo, cantidad, monto) VALUES (:insumos_id, :fecha_solicitud, :fecha_recibo, :cantidad, :monto)');
   $stament->bindParam(':insumos_id', $insumos_id);
   $stament->bindParam(':fecha_solicitud', $fecha_solicitud);
   $stament->bindParam(':fecha_recibo', $fecha_recibo);
   $stament->bindParam(':cantidad', $cantidad);
   $stament->bindParam(':monto', $monto);
   echo $stament->execute();
   $stament = null;


 

?>






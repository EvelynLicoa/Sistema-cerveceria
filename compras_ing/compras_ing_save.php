<?php


 
    $ingredientes_id =  isset($_POST['ingredientes_id']) ? $_POST['ingredientes_id'] : "";
    
    $fecha_solicitud =  isset($_POST['fecha_solicitud']) ? $_POST['fecha_solicitud'] : "";
    
    $fecha_recibo =  isset($_POST['fecha_recibo']) ? $_POST['fecha_recibo'] : "";
    
    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
    
    $monto =  isset($_POST['monto']) ? $_POST['monto'] : "";
    

  

   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('INSERT INTO compras_ingredientes (ingredientes_id, fecha_solicitud, fecha_recibo, cantidad, monto) VALUES (:ingredientes_id, :fecha_solicitud, :fecha_recibo, :cantidad, :monto)');
   $stament->bindParam(':ingredientes_id', $ingredientes_id);
   $stament->bindParam(':fecha_solicitud', $fecha_solicitud);
   $stament->bindParam(':fecha_recibo', $fecha_recibo);
   $stament->bindParam(':cantidad', $cantidad);
   $stament->bindParam(':monto', $monto);
   echo $stament->execute();
   $stament = null;


 

?>






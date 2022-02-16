<?php


   $cliente_id =  isset($_POST['cliente_id']) ? $_POST['cliente_id'] : ""; 


   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('DELETE ventas.* FROM ventas WHERE ventas.cliente_id=:cliente_id');
   $stament->bindParam(':cliente_id', $cliente_id);
   echo $stament->execute();




    

?>

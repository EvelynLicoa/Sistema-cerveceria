<?php

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
   

   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');

   $stament = $conn->prepare('DELETE ingredientes.* FROM ingredientes where id=:id');
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;


?>

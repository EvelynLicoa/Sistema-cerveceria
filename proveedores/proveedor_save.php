<?php


    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : "";
    
    $documento =  isset($_POST['documento']) ? $_POST['documento'] : "";
    
    $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : "";
    
    $email =  isset($_POST['email']) ? $_POST['email'] : "";
    
    $direccion =  isset($_POST['direccion']) ? $_POST['direccion'] : "";
    
    $localidad =  isset($_POST['localidad']) ? $_POST['localidad'] : "";
    
    $codPostal =  isset($_POST['codPostal']) ? $_POST['codPostal'] : "";
   


   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('INSERT INTO proveedores (nombre, documento, telefono, email, direccion, localidad, codPostal) VALUES (:nombre, :documento, :telefono, :email, :direccion, :localidad, :codPostal)');
   $stament->bindParam(':nombre', $nombre);
   $stament->bindParam(':documento', $documento);
   $stament->bindParam(':telefono', $telefono);
   $stament->bindParam(':email', $email);
   $stament->bindParam(':direccion', $direccion);
   $stament->bindParam(':localidad', $localidad);
   $stament->bindParam(':codPostal', $codPostal);
   echo $stament->execute();
   $stament = null;


 

?>






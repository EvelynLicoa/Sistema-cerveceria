<?php

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
        
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : "";
    
    $documento =  isset($_POST['documento']) ? $_POST['documento'] : "";
    
    $telefono =  isset($_POST['telefono']) ? $_POST['telefono'] : "";
    
    $email =  isset($_POST['email']) ? $_POST['email'] : "";
    
    $direccion =  isset($_POST['direccion']) ? $_POST['direccion'] : "";
    
    $localidad =  isset($_POST['localidad']) ? $_POST['localidad'] : "";
    
    $codPostal =  isset($_POST['codPostal']) ? $_POST['codPostal'] : "";



   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('UPDATE proveedores SET nombre=:nombre, documento=:documento, telefono=:telefono, email=:email, direccion=:direccion, localidad=:localidad, codPostal=:codPostal WHERE id=:id');
   $stament->bindParam(':nombre', $nombre);
   $stament->bindParam(':documento', $documento);
   $stament->bindParam(':telefono', $telefono);
   $stament->bindParam(':email', $email);
   $stament->bindParam(':direccion', $direccion);
   $stament->bindParam(':localidad', $localidad);
   $stament->bindParam(':codPostal', $codPostal);
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
    
    
?>


<?php


    $codigo =  isset($_POST['codigo']) ? $_POST['codigo'] : "";
    
    $proveedores_id =  isset($_POST['proveedores_id']) ? $_POST['proveedores_id'] : "";
    
    $capacidad =  isset($_POST['capacidad']) ? $_POST['capacidad'] : "";
    
    $localizacion=  isset($_POST['localizacion']) ? $_POST['localizacion'] : "";
    
    $lleno=  isset($_POST['lleno']) ? $_POST['lleno'] : "";
    
 
   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('INSERT INTO barriles (codigo, proveedores_id, capacidad, localizacion, lleno) VALUES (:codigo, :proveedores_id, :capacidad, :localizacion, lleno)');
   $stament->bindParam(':codigo', $codigo);
   $stament->bindParam(':proveedores_id', $proveedores_id);
   $stament->bindParam(':capacidad', $capacidad);
   $stament->bindParam(':localizacion', $localizacion);
   $stament->bindParam(':lleno', $lleno);
   echo $stament->execute();
   $stament = null;


 

?>






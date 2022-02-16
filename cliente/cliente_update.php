<?php

 session_start(); 


    $id =  isset($_POST['id']) ? $_POST['id'] : "";
        
    $numero =  isset($_POST['numero']) ? $_POST['numero'] : "";    
 
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : "";
    
    $domicilio =  isset($_POST['domicilio']) ? $_POST['domicilio'] : "";
    
    $cuit =  isset($_POST['cuit']) ? $_POST['cuit'] : "";
    
    $tipos_responsable_id =  isset($_POST['tipos_responsable_id']) ? $_POST['tipos_responsable_id'] : "";
    
    $provincias_id =  isset($_POST['provincias_id']) ? $_POST['provincias_id'] : "";
    
    $localidad =  isset($_POST['localidad']) ? $_POST['localidad'] : "";
    
    $cod_post =  isset($_POST['cod_post']) ? $_POST['cod_post'] : "";


   $conn1 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn1->prepare('UPDATE cliente SET numero=:numero, nombre=:nombre, domicilio=:domicilio, cuit=:cuit, tipos_responsable_id=:tipos_responsable_id, provincias_id=:provincias_id, localidad=:localidad, cod_post=:cod_post WHERE id=:id');
   $stament->bindParam(':numero', $numero);
   $stament->bindParam(':nombre', $nombre);
   $stament->bindParam(':domicilio', $domicilio);
   $stament->bindParam(':cuit', $cuit);
   $stament->bindParam(':tipos_responsable_id', $tipos_responsable_id);
   $stament->bindParam(':provincias_id', $provincias_id);
   $stament->bindParam(':localidad', $localidad);
   $stament->bindParam(':cod_post', $cod_post);
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
    
// *****************************************************************************************************************************************************************************************************************************************************************************
    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $fecha=date("Y-m-d");
    $hora=date("H:i:s");  
    $accion = 'ACTUALIZAR';
    $estado = 1; 
    
    $conn2 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn2->prepare('INSERT INTO auditoria_clientes (numero, nombre, domicilio, cuit, tipos_responsable_id, provincias_id, localidad, cod_post, estado, accion, fecha, hora) VALUES (:numero, :nombre, :domicilio, :cuit, :tipos_responsable_id, :provincias_id, :localidad, :cod_post, :estado, :accion, :fecha, :hora)');
    $stament->bindParam(':numero', $numero);
    $stament->bindParam(':nombre', $nombre);
    $stament->bindParam(':domicilio', $domicilio);
    $stament->bindParam(':cuit', $cuit);
    $stament->bindParam(':tipos_responsable_id', $tipos_responsable_id);
    $stament->bindParam(':provincias_id', $provincias_id);
    $stament->bindParam(':localidad', $localidad);
    $stament->bindParam(':cod_post', $cod_post);
    $stament->bindParam(':estado', $estado);
    $stament->bindParam(':accion', $accion);
    $stament->bindParam(':fecha', $fecha);
    $stament->bindParam(':hora', $hora);
    $stament->execute();
    $stament = null;

 
   
   
?>


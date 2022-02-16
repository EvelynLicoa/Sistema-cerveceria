<?php

session_start(); 


   $id =  isset($_POST['id']) ? $_POST['id'] : "";
   $estado = 1; 
   

   $conn1 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');

   $stament = $conn1->prepare('UPDATE cliente SET estado=:estado WHERE id=:id');
   $stament->bindParam(':id', $id);
   $stament->bindParam(':estado', $estado);
   echo $stament->execute();
   $stament = null;


//   ----------------------------------------------------------------------------------------------------------------
   
   $conn2 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn2->prepare('SELECT cliente.* FROM  cliente WHERE id=:id');
   $stament->bindParam(':id', $id);
   $stament->execute();
   
   $res = $stament->fetch();

   $numero = $res['numero']; 
   $nombre = $res['nombre']; 
   $domicilio = $res['domicilio']; 
   $cuit = $res['cuit']; 
   $tipos_responsable_id = $res['tipos_responsable_id']; 
   $provincias_id = $res['provincias_id']; 
   $localidad = $res['localidad']; 
   $cod_post = $res['cod_post']; 
   $estado = $res['estado']; 
   
   $stament = null;
   
//   -------------------------------------------------------------------------------------------------

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $fecha=date("Y-m-d");
    $hora=date("H:i:s");  
    $accion = 'HABILITAR';
    
    
    $conn3 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn3->prepare('INSERT INTO auditoria_clientes (numero, nombre, domicilio, cuit, tipos_responsable_id, provincias_id, localidad, cod_post, estado, accion, fecha, hora) VALUES (:numero, :nombre, :domicilio, :cuit, :tipos_responsable_id, :provincias_id, :localidad, :cod_post, :estado, :accion, :fecha, :hora)');
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




<?php

session_start(); 


$empresa_name = $_SESSION['empresa.nombre']; 

//ACA PUEDO,,,, O RECIBIR LA FECHA, O IR A BUSCAR LA FECHA DE LA TABLA SISTEMAS_3 


$conn = new PDO('mysql:host=localhost; dbname=sistemas_3', 'root', '');
$stament = $conn->prepare("SELECT empresas.fecha_Ini AS fecha FROM empresas WHERE empresas.nombre = :empresa_name");
$stament->bindParam(':empresa_name', $empresa_name);
$stament->execute(); 

$res = $stament->fetch();

$fecha= $res['fecha']; 

$conn = null; 
// ---------------------------------------------------------------------------------------------------------------

$setFecha = date("Y-m-d",strtotime($fecha."- 1 days")); 

// ---------------------------------------------------------------------------------------------------------------

// $connect = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
// $query = "UPDATE mayor SET mayor.ult_fecha = $setFecha"; 
// echo $stament = $connect->query($query);

$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
$stament = $conn->prepare("UPDATE mayor SET mayor.ult_fecha = :setFecha");
$stament->bindParam(':setFecha', $setFecha);
echo $stament->execute(); 

    // echo json_encode($setFecha);

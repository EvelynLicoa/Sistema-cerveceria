<?php


$barriles_id =  isset($_POST['barriles_id']) ? $_POST['barriles_id'] : ""; 
$localizacion = 'Devuelto'; 

$conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
$stament = $conn->prepare("UPDATE barriles SET barriles.localizacion=:localizacion WHERE barriles.id=:barriles_id");
$stament->bindParam(':localizacion', $localizacion);
$stament->bindParam(':barriles_id', $barriles_id);
echo $stament->execute(); 

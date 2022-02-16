<?php

$cliente_id =  isset($_POST['cliente_id']) ? $_POST['cliente_id'] : ""; 
$barriles_id =  isset($_POST['barriles_id']) ? $_POST['barriles_id'] : ""; 
 
$conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
$stament = $conn->prepare("UPDATE barriles SET barriles.localizacion=:cliente_id WHERE barriles.id=:barriles_id");
$stament->bindParam(':cliente_id', $cliente_id);
$stament->bindParam(':barriles_id', $barriles_id);
echo $stament->execute(); 

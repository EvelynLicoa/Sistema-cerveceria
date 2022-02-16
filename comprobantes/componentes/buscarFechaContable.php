<?php

$num_asiento =  isset($_POST['seat']) ? $_POST['seat'] : ""; 



$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
$stament = $conn->prepare("SELECT asientoborrador.fecha_contable AS fechaContable from asientoborrador WHERE asientoborrador.num_asiento = :num_asiento LIMIT 1");
$stament->bindParam(':num_asiento', $num_asiento);
$stament->execute();

$res = $stament->fetch();

$fechaContable = $res['fechaContable'];

echo json_encode($fechaContable);
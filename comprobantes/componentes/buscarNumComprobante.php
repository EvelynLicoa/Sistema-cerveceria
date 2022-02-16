<?php

$pto_venta =  isset($_POST['pto_venta']) ? $_POST['pto_venta'] : ""; 

//$tipo_comprobante =  isset($_POST['tipo_comprobante']) ? $_POST['tipo_comprobante'] : ""; 
$tipos_comprobantes_id = isset($_POST['tipo_comprobante']) ? $_POST['tipo_comprobante'] : ""; ; 



$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
$stament = $conn->prepare("SELECT ultimos_comprobantes.ult_num AS ultimoC FROM ultimos_comprobantes WHERE ultimos_comprobantes.pto_venta=:pto_venta AND ultimos_comprobantes.tipos_comprobantes_id=:tipos_comprobantes_id");
$stament->bindParam(':pto_venta', $pto_venta);
$stament->bindParam(':tipos_comprobantes_id', $tipos_comprobantes_id);
$stament->execute();

$resultado = $stament->fetch();

$num_comprobante = $resultado['ultimoC'] + 1;

//$num_comprobante = $res['num_comprobante'];

echo json_encode($num_comprobante);
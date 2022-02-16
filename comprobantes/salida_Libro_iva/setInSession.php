

<?php


// LE DOY A SESSION Y LUEGO CARGO ESO QUE ESTA HECHO ...ES COMO FILTROCUENTAS

session_start(); 

$fecha1 =  isset($_GET['fecha1']) ? $_GET['fecha1'] : "";
$fecha2 =  isset($_GET['fecha2']) ? $_GET['fecha2'] : "";

$num_comprobante1 =  isset($_GET['num_comprobante1']) ? $_GET['num_comprobante1'] : "";
$num_comprobante2 =  isset($_GET['num_comprobante2']) ? $_GET['num_comprobante2'] : "";

$tipo_comprobante =  isset($_GET['tipo_comprobante']) ? $_GET['tipo_comprobante'] : "";

$_SESSION['fecha1'] = $fecha1; 
$_SESSION['fecha2'] = $fecha2; 

$_SESSION['num_comprobante1'] = $num_comprobante1; 
$_SESSION['num_comprobante2'] = $num_comprobante2; 

$_SESSION['tipo_comprobante'] = $tipo_comprobante; 



echo json_encode('ok'); 

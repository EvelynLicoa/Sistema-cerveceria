

<?php


// LE DOY A SESSION Y LUEGO CARGO ESO QUE ESTA HECHO ...ES COMO FILTROCUENTAS

session_start(); 

$lotes_id =  isset($_GET['lotes_id']) ? $_GET['lotes_id'] : "";

$_SESSION['lotes_id'] = $lotes_id; 



echo json_encode('ok'); 

<?php




function devolver(){
session_start();

     
    $asiento = isset($_GET['asiento'])? $_GET['asiento']: "";

    $_SESSION['asiento'] = $asiento; 

    return $_SESSION['asiento']; 
}

   
echo devolver(); 


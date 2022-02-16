<?php




function devolver(){
session_start();

     
    $tipo_r = isset($_POST['tipo_r'])? $_POST['tipo_r']: "";

    $_SESSION['tipo'] = $tipo_r; 

    return $_SESSION['tipo']; 

}

   
echo devolver(); 


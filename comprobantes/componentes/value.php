<?php




function devolver(){
session_start();

     
    $valor = isset($_POST['value'])? $_POST['value']: "";

    $_SESSION['value'] = $valor; 

    return $_SESSION['value']; 

}

   
echo devolver(); 


<?php

session_start();

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare("SELECT MAX(encabezado_pie.id) AS mayor FROM encabezado_pie");
    $stament->execute();

    $res = $stament->fetch();
    
    $mayor = $res['mayor'];
    
    $_SESSION['num_enc_pie'] = $mayor; 
    
    echo json_encode($mayor);
    
    

//    $num_renglon = $res['mayor'] + 1;

//    $stament = null; 
    

   



<?php


session_start();


function getCodName(){

    $num_asiento = $_SESSION['asiento'];

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare("SELECT SUM(haber) AS total FROM asientoborrador WHERE num_asiento= :num_asiento");

    $stament->bindParam(':num_asiento', $num_asiento);
    $stament->execute();

   
    $res = $stament->fetch();

    $total = $res['total'];

    $tot = round($total, 2, PHP_ROUND_HALF_ODD); 


    return  json_encode($tot);
}


echo getCodName();
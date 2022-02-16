<?php

session_start();


function getCodName(){

    $num_asiento = $_SESSION['asiento'];


    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    
    $stament = $conn->prepare("SELECT (SUM(haber)-SUM(debe)) as diferencia FROM asientoborrador WHERE num_asiento= :num_asiento");

    $stament->bindParam(':num_asiento', $num_asiento);
    $stament->execute();

    $conn = null;

    // $arrayView = array();
     
    // while ($row = $stament->fetch()) {

    //     array_push($arrayView, $row);
    // }

    $res = $stament->fetch();

    $diferencia = $res['diferencia'];

    $dif = round($diferencia, 2, PHP_ROUND_HALF_ODD); 


    // -------------------------------------------------------------------------------------------------------------------------------------

    // $comparoDif = $dif;

    // $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

    // if($diferencia == 0 ){
    //     //entonces el update de asientoborrador.okcarga = 1

    //     $stm = $conn->prepare("UPDATE asientoborrador SET okcarga=1 WHERE num_asiento=$num_asiento");
    //     $stm->execute();
    // }else{
    //     //entonces el update de asientoborrador.okcarga = 0
    //     $stm = $conn->prepare("UPDATE asientoborrador SET okcarga=0 WHERE num_asiento=$num_asiento");
    //     $stm->execute();
    // }


    // $conn = null; 
    // ----------------------------------------------------------------------------------------------------------------------------------------


    return  json_encode($dif);

}

echo getCodName();
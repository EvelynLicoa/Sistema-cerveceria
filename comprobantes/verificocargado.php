<?php

session_start();

function getCodName(){

   $num_asiento = $_SESSION['asiento'];


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare("UPDATE asientoborrador SET asientoborrador.okcarga = 0 WHERE asientoborrador.num_asiento = :num_asiento");
   $stament->bindParam(':num_asiento', $num_asiento);
   $stament->execute();



}

echo getCodName();
 




?>






<?php







function getCodName(){

   $code =  isset($_POST['code']) ? $_POST['code'] : "";


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare("SELECT asientoborrador.num_asiento AS numero_asiento FROM asientoborrador WHERE asientoborrador.id =:code");
   $stament->bindParam(':code', $code);
   $stament->execute();


   $res = $stament->fetch();

   $asiento = $res['numero_asiento']; 

   // return  json_encode($asiento);




   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare("UPDATE asientoborrador SET asientoborrador.okcarga = 1 WHERE asientoborrador.num_asiento = :asiento");
   $stament->bindParam(':asiento', $asiento);
   $stament->execute();


   



}

echo getCodName();
 




?>






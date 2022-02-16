<?php


   $seat =  isset($_POST['seat']) ? $_POST['seat'] : "";


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

   $stament = $conn->prepare('DELETE asientoborrador.* FROM asientoborrador WHERE asientoborrador.num_asiento = :seat');
   $stament->bindParam(':seat', $seat);
   echo $stament->execute();




    

?>

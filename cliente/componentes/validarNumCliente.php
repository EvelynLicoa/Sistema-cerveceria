<?php



 function getListasRep(){

    $numero =  isset($_POST['numero']) ? $_POST['numero'] : "";    
 

   $conn1 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn1->prepare('SELECT COUNT(*) AS csntidad FROM clientes WHERE clientes.numero =:numero');
   $stament->bindParam(':numero', $numero);
   $stament->execute();
   
   $res = $stament->fetch();
   
   $cantidad = $res['csntidad'];
      
   return json_encode($cantidad);

 }
 
 echo getListasRep();
   
?>






<?php

    

   $id =  isset($_POST['cocciones_id']) ? $_POST['cocciones_id'] : "";
   $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
       
   
   
   
//   --------------------------------------------------
   
   $conn1 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn1->prepare('SELECT stock_actual as cantidadActual FROM cocciones WHERE id=:id'); 
   $stament->bindParam(':id', $id);
   $stament->execute();
   
   $res = $stament->fetch(); 
   
   $cantidadActual = $res['cantidadActual']; 
   
   $stament = null;
    
//    ---------------------------------------------------
    
   $stock_actual = $cantidadActual + $cantidad; 
    
   $conn2 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn2->prepare('UPDATE cocciones SET stock_actual=:stock_actual WHERE id=:id');
   $stament->bindParam(':stock_actual', $stock_actual); 
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
   
   
//    echo 'ok'; 
    
?>


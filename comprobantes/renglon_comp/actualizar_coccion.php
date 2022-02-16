<?php



    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
    $lotes_id =  isset($_POST['lotes_id']) ? $_POST['lotes_id'] : "";     
   
    $conn1 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn1->prepare('SELECT cocciones_id AS id FROM lotes WHERE lotes.id=:lotes_id'); 
    $stament->bindParam(':lotes_id', $lotes_id);
    $stament->execute();
   
    $res = $stament->fetch(); 
   
    $id = $res['id']; 
   
    $stament = null;
    
   
//+++++++++++
   $conn2 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn2->prepare('SELECT stock_actual as cantidadActual FROM cocciones WHERE id=:id'); 
   $stament->bindParam(':id', $id);
   $stament->execute();
   
   $res = $stament->fetch(); 
   
   $cantidadActual = $res['cantidadActual']; 
   
   $stament = null;
    
//    ---------------------------------------------------
    
   $stock_actual = $cantidadActual - $cantidad; 
    
   $conn3 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn3->prepare('UPDATE cocciones SET stock_actual=:stock_actual WHERE id=:id');
   $stament->bindParam(':stock_actual', $stock_actual); 
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
   
   
//    echo 'ok'; 
    
?>


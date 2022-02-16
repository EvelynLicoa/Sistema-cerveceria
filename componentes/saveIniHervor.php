<?php

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $date = date("Y-m-d");
    $time = date("H:i:s");  
    
    $ini_hervor = $date . ' ' .$time;

     
//    SELECT MAX(lotes.id) AS ultimo FROM lotes
   $conn1 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn1->query("SELECT MAX(lotes.id) AS ultimo_id FROM lotes");
   $stament->execute();

   $res = $stament->fetch();

   $ultimo_id = $res['ultimo_id']; 
    
//    ------------------------------------------------------------------------------------------------------------------
    
    $conn2 = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
            $stament = $conn2->prepare('UPDATE lotes SET ini_hervor=:ini_hervor WHERE id=:id');
            $stament->bindParam(':ini_hervor', $ini_hervor);
            $stament->bindParam(':id', $ultimo_id);
            $stament->execute();
            $stament = null;
            

?>




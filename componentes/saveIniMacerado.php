<?php

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $date = date("Y-m-d");
    $time = date("H:i:s");  
    
    $ini_macerado = $date . ' ' .$time;
//    $ini_macerado = mysql_real_escape_string($datetime);

    $cocciones_id =  isset($_POST['cocciones_id']) ? $_POST['cocciones_id'] : ""; 
    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";       


    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
            $stament = $conn->prepare('INSERT INTO lotes (cocciones_id, cantidad, ini_macerado) VALUES (:cocciones_id, :cantidad, :ini_macerado)');
            $stament->bindParam(':cocciones_id', $cocciones_id);
            $stament->bindParam(':cantidad', $cantidad);
            $stament->bindParam(':ini_macerado', $ini_macerado);
            $stament->execute();
            $stament = null;
            
            
            //    ----------------------------------------------------------------------------------------
    
            

?>







<?php



function DevolverArray(){

    $num_asiento =  isset($_GET['seat']) ? $_GET['seat'] : "";

    
   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare("UPDATE asientoborrador SET asientoborrador.registrado = 1 WHERE asientoborrador.num_asiento = :num_asiento");
   $stament->bindParam(':num_asiento', $num_asiento);
   $stament->execute();


   
      

    return 'ok'; 

        

}

echo DevolverArray(); 


<?php



function SendNewSeat(){

            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

            $query = "SELECT MAX(num_asiento) AS mayor FROM asientoborrador"; 

            $stament = $conn->prepare($query);
            $stament->execute();

            $res = $stament->fetch();

            $new_asiento = $res['mayor'] + 1;

  return json_encode($new_asiento);
}


echo SendNewSeat(); 




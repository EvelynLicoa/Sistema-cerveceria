
<?php







function getCodName(){

   $num_renglon =  isset($_POST['id']) ? $_POST['id'] : "";


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
   $stament = $conn->prepare("SELECT asientoborrador.num_asiento AS numero_asiento FROM asientoborrador WHERE asientoborrador.num_renglon =:num_renglon");
   $stament->bindParam(':num_renglon', $num_renglon);
   $stament->execute();



   $res = $stament->fetch();

   $asiento = $res['numero_asiento'];


    $conn = null;
    $query = "SELECT (SUM(haber)-SUM(debe)) as diferencia FROM asientoborrador WHERE num_asiento=$asiento";

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare($query);

    $stament->execute();

    $res = $stament->fetch();

    //sleep(1);
    $dif = $res['diferencia']; 

    
    //Emppty true si es 0,00 si es 0, o si es ""
   if($dif==0){
    //Si esta en 0 lo marca como OK! 
    $conn = null;
    $query2 = "UPDATE asientoborrador SET asientoborrador.okcarga = 1 WHERE asientoborrador.num_asiento = $asiento";
    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare($query2);
    //$stament->bindParam(':asiento', $asiento);
    $stament->execute();
    return json_encode($query2);
      
   }else{
    $conn = null;
    $query3 = "UPDATE asientoborrador SET asientoborrador.okcarga = 0 WHERE asientoborrador.num_asiento = $asiento";
    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare($query3);
    //$stament->bindParam(':asiento', $asiento);
    $stament->execute();
    return json_encode($query3);
   }


}

echo getCodName();
 




?>




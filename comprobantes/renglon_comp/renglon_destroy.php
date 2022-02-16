
<?php

// session_start();    

function ProbandoEliminarRow(){


   $id_sw = isset($_GET['id_sw']) ? $_GET['id_sw'] : "";


   $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');


    
   $stament = $conn->prepare('DELETE renglones_factura_borrador.* FROM renglones_factura_borrador WHERE id_sw=:id_sw');
   $stament->bindParam(':id_sw', $id_sw);
   $stament->execute();

}

echo ProbandoEliminarRow();



































//    $stament = $conn->prepare("SELECT * FROM asientoborrador WHERE id_sw= :id_sw");
//    $stament->bindParam(':id_sw', $id_sw);
//    $stament->execute();

//    $arrayView = array();
    
//    while ($row = $stament->fetch()) {

//        array_push($arrayView, $row);
//    }


//    return  json_encode($arrayView);



<?php


function getCodName(){
        
    $id =  isset($_POST['code']) ? $_POST['code'] : "";


    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn->prepare('SELECT barriles.* FROM barriles WHERE id=:id');
    $stament->bindParam(':id', $id);
    $stament->execute();

    $arrayView = array();
     
    while ($row = $stament->fetch()) {

        array_push($arrayView, $row);
    }


    return  json_encode($arrayView);
}

echo getCodName();



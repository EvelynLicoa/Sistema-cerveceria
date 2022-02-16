

<?php


function getCodName(){
        
    $id =  isset($_POST['code']) ? $_POST['code'] : "";


    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare('SELECT clientes.*, tipos_responsable.descripcion AS tipo_r, provincias.descripcion AS provincia FROM clientes INNER JOIN tipos_responsable ON clientes.tipos_responsable_id = tipos_responsable.id INNER JOIN provincias ON clientes.provincias_id = provincias.id WHERE clientes.id=:id');
    $stament->bindParam(':id', $id);
    $stament->execute();

    $arrayView = array();
     
    while ($row = $stament->fetch()) {

        array_push($arrayView, $row);
    }


    return  json_encode($arrayView);
}

echo getCodName();



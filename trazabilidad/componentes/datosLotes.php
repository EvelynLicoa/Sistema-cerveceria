

<?php


function getCodName(){
    
    $barriles_id =  isset($_POST['barriles_id']) ? $_POST['barriles_id'] : "";
    $clientes_id =  isset($_POST['clientes_id']) ? $_POST['clientes_id'] : "";

    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn->prepare('SELECT ventas.lotes_id FROM ventas WHERE cliente_id=:cliente_id AND barriles_id=:barriles_id ORDER BY fecha_entrega DESC LIMIT 1');
    $stament->bindParam(':barriles_id', $barriles_id);
    $stament->bindParam(':cliente_id', $clientes_id);
    $stament->execute();

    $arrayView = array();
     
    while ($row = $stament->fetch()) {

        array_push($arrayView, $row);
    }


    return  json_encode($arrayView);
}

echo getCodName();



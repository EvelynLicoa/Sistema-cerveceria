

<?php


function getCodName(){
        
    $codigo =  isset($_POST['code']) ? $_POST['code'] : "";


    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn->prepare("SELECT DISTINCT barriles.*, envases.*, lotes.id, cocciones.nombre AS contenido, cocciones.precio_venta FROM barriles 
                INNER JOIN envases ON (barriles.id = envases.id_Barril) 
                INNER JOIN lotes ON (envases.id_Lote = lotes.id) 
                INNER JOIN cocciones ON (lotes.cocciones_id = cocciones.id) WHERE barriles.id=:codigo");
    $stament->bindParam(':codigo', $codigo);
    $stament->execute();

    $arrayView = array();
     
    while ($row = $stament->fetch()) {

        array_push($arrayView, $row);
    }


    return  json_encode($arrayView);
}

echo getCodName();
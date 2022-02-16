
<?php


function getCodName(){

    $cliente_id =  isset($_POST['cliente_id']) ? $_POST['cliente_id'] : ""; 
    
    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $stament = $conn->prepare("SELECT SUM(monto_total) AS total FROM ventas WHERE ventas.cliente_id=:cliente_id");
    $stament->bindParam(':cliente_id', $cliente_id);
    $stament->execute();

    $res = $stament->fetch();

    $total = $res['total'];

    $tot = round($total, 2, PHP_ROUND_HALF_ODD); 


    return  json_encode($tot);



}

echo getCodName();
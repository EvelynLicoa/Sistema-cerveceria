<?php


    $id =  isset($_POST['id']) ? $_POST['id'] : "";
        
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : "";
    
    $proveedores_id =  isset($_POST['proveedores_id']) ? $_POST['proveedores_id'] : "";
    
    $descripcion =  isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
    
    $stock_min =  isset($_POST['stock_min']) ? $_POST['stock_min'] : "";
    
    $stock_actual =  isset($_POST['stock_actual']) ? $_POST['stock_actual'] : "";
    
    $costo =  isset($_POST['costo']) ? $_POST['costo'] : "";
    
    $cantidad =  isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
   
    $recordatorio =  isset($_POST['recordatorio']) ? $_POST['recordatorio'] : "";
    
    
   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('UPDATE insumos SET nombre=:nombre, proveedores_id=:proveedores_id, descripcion=:descripcion, stock_min=:stock_min, stock_actual=:stock_actual, costo=:costo, cantidad=:cantidad, recordatorio=:recordatorio WHERE id=:id');
   $stament->bindParam(':nombre', $nombre);
   $stament->bindParam(':proveedores_id', $proveedores_id);
   $stament->bindParam(':descripcion', $descripcion);
   $stament->bindParam(':stock_min', $stock_min);
   $stament->bindParam(':stock_actual', $stock_actual);
   $stament->bindParam(':costo', $costo);
   $stament->bindParam(':cantidad', $cantidad);
   $stament->bindParam(':recordatorio', $recordatorio);
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
    
    
?>


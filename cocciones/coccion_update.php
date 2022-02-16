<?php

    

    $id =  isset($_POST['id']) ? $_POST['id'] : "";
        
    $nombre =  isset($_POST['nombre']) ? $_POST['nombre'] : "";
    
    $tipo_receta =  isset($_POST['tipo_receta']) ? $_POST['tipo_receta'] : "";
    
    $tipo_cerveza =  isset($_POST['tipo_cerveza']) ? $_POST['tipo_cerveza'] : "";
    
    $color =  isset($_POST['color']) ? $_POST['color'] : "";
    
    $amargor =  isset($_POST['amargor']) ? $_POST['amargor'] : "";
    
    $densidad =  isset($_POST['densidad']) ? $_POST['densidad'] : "";
    
    $tiempo_macerado =  isset($_POST['tiempo_macerado']) ? $_POST['tiempo_macerado'] : "";
    
    $tiempo_hervor =  isset($_POST['tiempo_hervor']) ? $_POST['tiempo_hervor'] : "";
    
    $tiempo_ferm =  isset($_POST['tiempo_ferm']) ? $_POST['tiempo_ferm'] : "";
    
    $tiempo_enfr =  isset($_POST['tiempo_enfr']) ? $_POST['tiempo_enfr'] : "";
    
    $favorito =  isset($_POST['favorito']) ? $_POST['favorito'] : "";
    
    $precio_venta =  isset($_POST['precio_venta']) ? $_POST['precio_venta'] : "";
    
    $descuento =  isset($_POST['descuento']) ? $_POST['descuento'] : "";
    
    $stock_min =  isset($_POST['stock_min']) ? $_POST['stock_min'] : "";
    
    $stock_actual =  isset($_POST['stock_actual']) ? $_POST['stock_actual'] : "";
   
   


   $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
   $stament = $conn->prepare('UPDATE cocciones SET nombre=:nombre, tipo_receta=:tipo_receta, tipo_cerveza=:tipo_cerveza, color=:color, amargor=:amargor, densidad=:densidad, tiempo_macerado=:tiempo_macerado, tiempo_hervor=:tiempo_hervor, tiempo_ferm=:tiempo_ferm, tiempo_enfr=:tiempo_enfr, favorito=:favorito, precio_venta=:precio_venta, descuento=:descuento, stock_min=:stock_min, stock_actual=:stock_actual WHERE id=:id');
   $stament->bindParam(':nombre', $nombre);
   $stament->bindParam(':tipo_receta', $tipo_receta);
   $stament->bindParam(':tipo_cerveza', $tipo_cerveza);
   $stament->bindParam(':color', $color);
   $stament->bindParam(':amargor', $amargor);
   $stament->bindParam(':densidad', $densidad);
   $stament->bindParam(':tiempo_macerado', $tiempo_macerado);
   $stament->bindParam(':tiempo_hervor', $tiempo_hervor);
   $stament->bindParam(':tiempo_ferm', $tiempo_ferm);
   $stament->bindParam(':tiempo_enfr', $tiempo_enfr);
   $stament->bindParam(':favorito', $favorito);
   $stament->bindParam(':precio_venta', $precio_venta);
   $stament->bindParam(':descuento', $descuento);
   $stament->bindParam(':stock_min', $stock_min);
   $stament->bindParam(':stock_actual', $stock_actual); 
   $stament->bindParam(':id', $id);
   echo $stament->execute();
   $stament = null;
    
    
?>


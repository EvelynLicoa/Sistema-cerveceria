<?php

            
    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn->prepare("INSERT INTO renglones_factura (stock_id, precio_neto, cantidad, iva, encabezado_pie_id, bonificacion, impuesto_interno)
    SELECT stock_id, precio_neto, cantidad, iva, encabezado_pie_id, bonificacion, impuesto_interno
    FROM renglones_factura_borrador");
    echo $stament->execute();
    $conn = null; 
    
//---------------------------------------------------------------------------------------------------------------------------
    
    $conn2 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $stament = $conn2->prepare("DELETE renglones_factura_borrador.* FROM renglones_factura_borrador");
    echo $stament->execute();
    $conn2 = null; 
    

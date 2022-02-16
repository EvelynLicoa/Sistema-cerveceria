<?php
    include 'comprobante_plantilla.php';
    include 'dbh.php';

    session_start();
    
//    echo $_SESSION['empresa.nombre'];
//    
    $pdf = new PDF();
    $pdf->AddPage();

    //Paso id de comprobante a facturar
    $comprobante = $_SESSION['encabezado_pie_id'];

    //Paso id de la empresa
    $empresa = $_SESSION['empresa.nombre'];

    //Busco el encabezado/pie
    $sqlenc = "SELECT encabezado_pie.*, tipos_comprobantes.descripcion, condicion_venta.descripcion AS 'Formapago' FROM encabezado_pie
    INNER JOIN tipos_comprobantes ON encabezado_pie.tipos_comprobantes_id=tipos_comprobantes.id 
    INNER JOIN condicion_venta ON encabezado_pie.condicion_venta_id=condicion_venta.id WHERE encabezado_pie.id=$comprobante";
    $resultenc = mysqli_query($conn3, $sqlenc);
    $rowenc = mysqli_fetch_assoc($resultenc);

    //Busco datos de la empresa
    $sqlemp = "SELECT * FROM empresas WHERE empresas.nombre='$empresa'";
    //ACA HICE EL PRIMER CAMBIO
    $resultemp = mysqli_query($conn, $sqlemp);
    $rowemp = mysqli_fetch_assoc($resultemp);

    //Inserto logo
    $pdf->Image('imagenes/LOGO.png',10,5,75,30);

    //Determino letra del comprobante
    if ($rowenc['tipos_comprobantes_id']<6) {
        $letra='A';
    } elseif ($rowenc['tipos_comprobantes_id']<11) {
        $letra='B';
    }

    //Muestro letra y codigo de comprobante
    $pdf->SetXY(95,5);
    $pdf->SetFont('Arial','',24);
    $pdf->Cell(20,5,$letra,0,2,'C',0);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(20,5,'Cod. 0'.$rowenc['tipos_comprobantes_id'],0,1,'C',0);
    
    //Muestro datos vendedor (lado izquierdo)
    $pdf->SetXY(10,35);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,5,$rowemp['direccion'],0,1,'L',0);
    $pdf->Cell(100,5,$rowemp['localidad'],0,1,'L',0);
    $pdf->Cell(100,5,$rowemp['provincia'],0,1,'L',0);
    $pdf->Cell(100,5,$rowemp['telefono'],0,1,'L',0);

    //Muestro tipo y nro de comprobante
    $pdf->SetXY(140,10);
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(100,5,$rowenc['descripcion'],0,2,'L',0);
    $pdf->SetFont('Arial','',14);
    $pdf->Cell(100,5, sprintf("%04d",$rowenc['pto_vta']).'-'.sprintf("%08d",$rowenc['num_comprobante']),0,2,'L',0);

    //Muestro datos vendedor (lado derecho)
    $pdf->SetXY(140,35);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(100,5,'CUIT: '.$rowemp['cuit'],0,2,'L',0);
    $pdf->Cell(100,5,'Inicio de Actividad: '.$rowemp['ini_actividades'],0,2,'L',0);
    //SEGUNDO CAMBIO ACA
    $pdf->Cell(100,5,$rowemp['tipos_responsable'],0,1,'L',0);

    $pdf->Ln(8);

    //Busco datos del cliente
    $cliente=$rowenc['clientes_id'];
    $sqlcliente = "SELECT clientes.*, provincias.descripcion FROM clientes
    INNER JOIN provincias ON clientes.provincias_id=provincias.id WHERE clientes.id=$cliente";
    $resultcliente = mysqli_query($conn3, $sqlcliente);
    $rowcliente = mysqli_fetch_assoc($resultcliente);
    
    $pdf->Line(0,55,300,55);

    //Muestro datos del cliente y condicion de venta (tipo de pago)
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(100,5,'Nombre: '.$rowcliente['nombre'],0,0,'L',0);
    $pdf->Cell(100,5,'CUIT/DNI: '.$rowcliente['cuit'],0,1,'L',0);
    $pdf->Cell(100,5,'Provincia: '.$rowcliente['descripcion'],0,0,'L',0);
    $pdf->Cell(100,5,'Condicion IVA: '.$rowenc['cliente_sit_iva'],0,1,'L',0);
    $pdf->Cell(100,5,'Domicilio: '.$rowcliente['domicilio'].', '.$rowcliente['localidad'],0,0,'L',0);
    $pdf->Cell(100,5,'Condicion de venta: '.$rowenc['Formapago'],0,1,'L',0);

    $pdf->Line(0,75,300,75);

    //Muestro encabezado de renglones
    $pdf->Ln(5);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(232,232,232);
    if ($letra=='A') {
        $pdf->Cell(11,6,'Cant.',0,0,'L',1);
        $pdf->Cell(20,6,'Codigo',0,0,'L',1);
        $pdf->Cell(80,6,'Descripcion',0,0,'L',1);
        $pdf->Cell(25,6,'Pcio neto u',0,0,'L',1);
        $pdf->Cell(25,6,'IVA',0,0,'L',1);
        $pdf->Cell(25,6,'Subtotal',0,0,'L',1);
    } elseif ($letra=='B') {
        $pdf->Cell(11,6,'Cant.',0,0,'L',1);
        $pdf->Cell(20,6,'Codigo',0,0,'L',1);
        $pdf->Cell(105,6,'Descripcion',0,0,'L',1);
        $pdf->Cell(25,6,'Pcio neto u',0,0,'L',1);
        $pdf->Cell(25,6,'Subtotal',0,0,'L',1);
    }
    $pdf->Ln();
    
    //Traigo y muestro renglones del comprobante
    $sqlrenglon = "SELECT renglones_factura.*, stock.descripcion FROM renglones_factura 
    INNER JOIN stock ON renglones_factura.stock_id=stock.id WHERE encabezado_pie_id=$comprobante";
    $resultrenglon = mysqli_query($conn3, $sqlrenglon);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(255,255,255);
    $totalcomp=0;
    $concnograv=0;

    if ($letra=='A') {
        while ($rowrenglon = mysqli_fetch_assoc($resultrenglon)) {
            $bonificado=$rowrenglon['precio_neto']-$rowrenglon['precio_neto']*$rowrenglon['bonificacion']/100;
            $impiva=$rowrenglon['cantidad']*$bonificado*$rowrenglon['iva']/100;
            $subtotal=$rowrenglon['cantidad']*($bonificado+$rowrenglon['impuesto_interno']);
            $pdf->Cell(11,6,$rowrenglon['cantidad'],0,0,'L',1);
            $pdf->Cell(20,6,$rowrenglon['stock_id'],0,0,'L',1);
            $pdf->Cell(80,6,$rowrenglon['descripcion'],0,0,'L',1);
            $pdf->Cell(25,6,'$'.$rowrenglon['precio_neto'],0,0,'R',1);
            $pdf->Cell(25,6,'$'.$impiva,0,0,'R',1);
            $pdf->Cell(25,6,'$'.$subtotal,0,0,'R',0);
            
            //Calculo conceptos no gravados (impuestos internos)
            $concnograv=$concnograv+$rowrenglon['cantidad']*$rowrenglon['impuesto_interno'];
            //Calculo total para mostrar al final
            $totalcomp = $totalcomp+$impiva+$subtotal;
            $pdf->Ln();
        }
    } else {
        while ($rowrenglon = mysqli_fetch_assoc($resultrenglon)) {
            $bonificado=$rowrenglon['precio_neto']-$rowrenglon['precio_neto']*$rowrenglon['bonificacion']/100;
            $preciounit=$bonificado+$bonificado*$rowrenglon['iva']/100;
            $subtotal=$rowrenglon['cantidad']*($preciounit+$rowrenglon['impuesto_interno']);
            $pdf->Cell(11,6,$rowrenglon['cantidad'],0,0,'L',1);
            $pdf->Cell(20,6,$rowrenglon['stock_id'],0,0,'L',1);
            $pdf->Cell(105,6,$rowrenglon['descripcion'],0,0,'L',1);
            $pdf->Cell(25,6,'$'.$preciounit,0,0,'R',1);
            $pdf->Cell(25,6,'$'.$subtotal,0,0,'R',0);
    
            //Calculo total para mostrar al final
            $totalcomp = $totalcomp+$subtotal;
            $pdf->Ln();
        }
    }
    
    $pdf->Line(0,250,300,250);

    //Muestro neto e impuesto totalizados por IVA
    if ($letra=='A') {
        $pdf->SetXY(10,252);
        $sqlivas = "SELECT DISTINCT iva FROM renglones_factura WHERE encabezado_pie_id=$comprobante";
        $resultivas = mysqli_query($conn3,$sqlivas);
        while ($rowivas = mysqli_fetch_assoc($resultivas)) {
            $ivabuscado = $rowivas['iva'];
            $sqlrenglon2 = "SELECT * FROM renglones_factura WHERE (iva=$ivabuscado AND encabezado_pie_id=$comprobante)";
            $resultrenglon2 = mysqli_query($conn3, $sqlrenglon2);
            $totnetoiva=0;
            while ($rowrenglon2 = mysqli_fetch_assoc($resultrenglon2)) {
                $totnetoiva=$totnetoiva+$rowrenglon2['precio_neto']*$rowrenglon2['cantidad'];
            }
            $totimpiva=$totnetoiva*$rowivas['iva']/100;
            $pdf->Cell(80,6,'',0,0,'L',1);
            $pdf->Cell(30,6,'Neto '.$rowivas['iva'].': $'.$totnetoiva,0,0,'L',1);
            $pdf->Cell(30,6,'IVA '.$rowivas['iva'].': $'.$totimpiva,0,0,'L',1);
            $pdf->Ln();
        }
        $pdf->Cell(80,6,'',0,0,'L',1);
        $pdf->Cell(80,6,'Conceptos no gravados: $'.$concnograv,0,0,'L',1);
    }

    //Muestro total
    $pdf->SetXY(170,252);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(30,6,'TOTAL: $'.$totalcomp,0,0,'R',1);

    $pdf->Output();
?>


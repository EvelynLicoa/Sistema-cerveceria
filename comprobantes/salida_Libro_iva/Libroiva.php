<?php
    include 'Libroiva_plantilla.php';
    include '../../comprobantes/salidaComprobante/dbh.php';

    $livapdf = new LIVAPDF('L');
    $livapdf->AddPage();

    //Hago consulta segun el tipo de filtro
    if ($filtro=='fecha') {
        $sqlcomp = "SELECT encabezado_pie.*, clientes.nombre, clientes.cuit, tipos_comprobantes.descripcion FROM encabezado_pie 
        INNER JOIN clientes ON encabezado_pie.clientes_id=clientes.id
        INNER JOIN tipos_comprobantes ON encabezado_pie.tipos_comprobantes_id=tipos_comprobantes.id WHERE encabezado_pie.dia BETWEEN '$finicio' AND '$ffin'
        ORDER BY dia, tipos_comprobantes_id, pto_vta, num_comprobante";
    } elseif ($filtro=='tipocomp') {
        $sqlcomp = "SELECT encabezado_pie.*, clientes.nombre, clientes.cuit, tipos_comprobantes.descripcion FROM encabezado_pie 
        INNER JOIN clientes ON encabezado_pie.clientes_id=clientes.id
        INNER JOIN tipos_comprobantes ON encabezado_pie.tipos_comprobantes_id=tipos_comprobantes.id WHERE tipos_comprobantes_id=$tipocomp
        ORDER BY dia, tipos_comprobantes_id, pto_vta, num_comprobante";
    } elseif ($filtro=='numcomp') {
        $sqlcomp = "SELECT encabezado_pie.*, clientes.nombre, clientes.cuit, tipos_comprobantes.descripcion FROM encabezado_pie 
        INNER JOIN clientes ON encabezado_pie.clientes_id=clientes.id
        INNER JOIN tipos_comprobantes ON encabezado_pie.tipos_comprobantes_id=tipos_comprobantes.id WHERE encabezado_pie.id BETWEEN $cinicio AND $cfin
        ORDER BY dia, tipos_comprobantes_id, pto_vta, num_comprobante";
    }
    $resultcomp = mysqli_query($conn3,$sqlcomp);

    //Muestro encabezados de la tabla

    //Defino variables
    $bonificacion=0;
    $netogravado=0;
    $iva=0;
    $otrosimp=0;
    $total=0;

    //Muestro renglones
    $livapdf->SetFont('Arial','',10);
    while ($rowcomp = mysqli_fetch_assoc($resultcomp)) {
        //Busco por el tipo de comprobante si debe sumar o restar al libro de iva
        $tcomprob=$rowcomp['tipos_comprobantes_id'];
        $sqlsigno = "SELECT libro_iva FROM tipos_comprobantes WHERE id=$tcomprob";
        $resultsigno = mysqli_query($conn3,$sqlsigno);
        $rowsigno = mysqli_fetch_assoc($resultsigno);
        $signo = $rowsigno['libro_iva'];
        //Busco los renglones del cmprobante
        $id=$rowcomp['id'];
        $sqlrenglon = "SELECT * FROM renglones_factura WHERE encabezado_pie_id=$id";
        $resultrenglon = mysqli_query($conn3,$sqlrenglon);
        while ($rowrenglon = mysqli_fetch_assoc($resultrenglon)) {
            //Calculo valores individuales de cada columna
            $bonificacion = $rowrenglon['cantidad']*$rowrenglon['precio_neto']*$rowrenglon['bonificacion']/100;
            $netogravado = $rowrenglon['cantidad']*$rowrenglon['precio_neto']-$bonificacion;
            $iva = ($rowrenglon['cantidad']*$rowrenglon['precio_neto']-$bonificacion)*$rowrenglon['iva']/100;
            $otrosimp = $rowrenglon['cantidad']*$rowrenglon['impuesto_interno'];
            $total = $netogravado+$iva+$otrosimp;
            if ($signo=='-') {
                $netogravado = 0-$netogravado;
                $iva = 0-$iva;
                $otrosimp = 0-$otrosimp;
                $total = 0-$total;
            }
            
            
            
            //Calculo totales
           
        }
        //Muestro datos del renglon
        $livapdf->Cell(20,5,$rowcomp['dia'],0,0,'L',0);
            $livapdf->Cell(30,5,$rowcomp['descripcion'],0,0,'L',0);
            $livapdf->Cell(30,5,sprintf("%04d",$rowcomp['pto_vta']).'-'.sprintf("%08d",$rowcomp['num_comprobante']),0,0,'L',0);
            $livapdf->Cell(60,5,$rowcomp['nombre'],0,0,'L',0);
            $livapdf->Cell(30,5,$rowcomp['cuit'],0,0,'L',0);
            $livapdf->Cell(25,5,'$'.$netogravado,0,0,'R',0);
            $livapdf->Cell(25,5,'$'.$iva,0,0,'R',0);
            $livapdf->Cell(25,5,'$'.$otrosimp,0,0,'R',0);
            $livapdf->Cell(25,5,'$'.$total,0,0,'R',0);
            $livapdf->Ln();
             $netogravadotot = $netogravadotot+$netogravado;
            $ivatot = $ivatot+$iva;
            $otrosimptot = $otrosimptot+$otrosimp;
            $totaltot = $totaltot+$total;   

            
    }
    //Muestro totales
    $livapdf->SetFont('Arial','',12);
    $livapdf->SetFillColor(220,220,220);
    $livapdf->Cell(170,6,'TOTALES: ',0,0,'R',1);
    $livapdf->Cell(25,6,'$'.$netogravadotot,0,0,'R',1);
    $livapdf->Cell(25,6,'$'.$ivatot,0,0,'R',1);
    $livapdf->Cell(25,6,'$'.$otrosimptot,0,0,'R',1);
    $livapdf->Cell(25,6,'$'.$totaltot,0,0,'R',1);

    $livapdf->Output();
?>
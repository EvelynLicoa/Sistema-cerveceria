<?php
    include 'Trazabilidad_plantilla.php';
    include 'dbh.php';

    $trazapdf = new TRAZAPDF();
    $trazapdf->AddPage();


    $sqlcoccion="SELECT nombre from cocciones WHERE id=$idcoccion";
    $resultcoccion=mysqli_query($conn,$sqlcoccion);
    $rowcoccion=mysqli_fetch_assoc($resultcoccion);

    $trazapdf->SetFont('Arial','',15);
    $trazapdf->SetFillColor(220,220,220);
    $trazapdf->Cell(100,6,'Coccion: '.$rowcoccion['nombre'],0,0,'L',0);
    $trazapdf->Cell(100,6,'Cant. producida: '.$rowlote['cantidad'].' litros',0,1,'L',0);
    $trazapdf->Ln(1);
    $trazapdf->SetFont('Arial','B',12);
    $trazapdf->Cell(180,5,'Tiempos',0,1,'L',1);
    $trazapdf->SetFont('Arial','',12);
    $trazapdf->Cell(40,5,'Macerado',0,0,'L',0);
    $trazapdf->Cell(100,5,'Inicio: '.$rowlote['ini_macerado'].'  Fin: '.$rowlote['fin_macerado'],0,1,'L',0);
    $trazapdf->Cell(40,5,'Hervor',0,0,'L',0);
    $trazapdf->Cell(100,5,'Inicio: '.$rowlote['ini_hervor'].'  Fin: '.$rowlote['fin_hervor'],0,1,'L',0);
    $trazapdf->Cell(40,5,'Fermentacion',0,0,'L',0);
    $trazapdf->Cell(100,5,'Inicio: '.$rowlote['ini_ferm'].'  Fin: '.$rowlote['fin_ferm'],0,1,'L',0);
    $trazapdf->Cell(40,5,'Frio',0,0,'L',0);
    $trazapdf->Cell(100,5,'Inicio: '.$rowlote['ini_frio'].'  Fin: '.$rowlote['fin_frio'],0,1,'L',0);    
    $trazapdf->Ln(5);

    //Busco en la tabla Componen todos los ingredientes (id) de esa coccion
    $sqlcomp="SELECT id_Ingrediente from componen WHERE id_Coccion=$idcoccion";
    $resultcomp=mysqli_query($conn,$sqlcomp);

    $trazapdf->SetFont('Arial','B',12);
    $trazapdf->Cell(180,5,'Ingredientes',0,1,'L',1);
    $trazapdf->SetFont('Arial','',12);
    $trazapdf->Cell(40,5,'Nombre',0,0,'L',1);
    $trazapdf->Cell(60,5,'Descripcion',0,0,'L',1);
    $trazapdf->Cell(40,5,'Proveedor',0,0,'L',1);
    $trazapdf->Cell(40,5,'Documento',0,1,'L',1);
    while ($rowcomp=mysqli_fetch_assoc($resultcomp)) {
        $idingred=$rowcomp['id_Ingrediente'];
        //Busco datos del ingrediente 
        $sqlingred="SELECT nombre, proveedores_id, descripcion from ingredientes WHERE id=$idingred";
        $resultingred=mysqli_query($conn,$sqlingred);
        $rowingred=mysqli_fetch_assoc($resultingred);

        $idprov=$rowingred['proveedores_id'];
        //Busco datos del proveedor del ingrediente
        $sqlprov="SELECT nombre, documento from proveedores WHERE id=$idprov";
        $resultprov=mysqli_query($conn,$sqlprov);
        $rowprov=mysqli_fetch_assoc($resultprov);

        //Listo ingredientes y su proveedor
        $trazapdf->Cell(40,5,$rowingred['nombre'],0,0,'L',0);
        $trazapdf->Cell(60,5,$rowingred['descripcion'],0,0,'L',0);
        $trazapdf->Cell(40,5,$rowprov['nombre'],0,0,'L',0);
        $trazapdf->Cell(40,5,$rowprov['documento'],0,1,'L',0);
    }
    $trazapdf->Ln(5);

    

    $trazapdf->Output();
?>
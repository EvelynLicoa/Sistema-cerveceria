<?php
    require '../../comprobantes/salidaComprobante/fpdf181/fpdf.php';
    include '../../comprobantes/salidaComprobante/dbh.php';

    session_start(); 
    
    
    
    $netogravadotot=0;
    $ivatot=0;
    $otrosimptot=0;
    $totaltot=0;

    //ID de empresa en la que estoy para traer sus datos y mostrarlos em cabecera
    $empresa=1;
        
    
//      if (isset($_SESSION['fecha1'])) {
//            $finicio = $_SESSION['fecha1'];
//            $ffin = $_SESSION['fecha2'];
//            //$filtro='fecha';
//     }elseif(isset($_SESSION['asiento1'])){
//         $cinicio = $_SESSION['asiento1'];
//         $cfin = $_SESSION['asiento2'];
//         //$filtro='numcomp';
//         
//     }
    
     
//     if (isset($_SESSION['asiento1'])){
         $cinicio = $_SESSION['num_comprobante1'];
         $cfin = $_SESSION['num_comprobante2'];
         $finicio = $_SESSION['fecha1'];
         $ffin = $_SESSION['fecha2'];
         $tipocomp = $_SESSION['tipo_comprobante'];
//     };
         
     
     
     if(($finicio!='') and ($ffin!='')){
          $filtro='fecha';
     }elseif(($cinicio!='') and ($cfin!='')){
          $filtro='numcomp';
     }elseif($tipocomp!=''){
          $filtro='tipocomp';
     }
     
    //Valores que hay que pasar a los filtros
//    $finicio=2019-10-01;
//    $ffin=2019-10-11;
     
     
//    $finicio=$desdefecha;
//    $ffin=$hastafecha;
//    $cinicio=$asiento1;
//    $cfin=$asiento1;
//    $tipocomp=1;
    //Filtrado por: (Fecha='fecha' - Num comprobante='numcomp' - Tipo comprobante='tipocomp')
//    $filtro='numcomp';
  
    //Query de la empresa
    $sqlemp = "SELECT Nombre, cuit FROM Empresas where id=$empresa";
    $resultemp = mysqli_query($conn,$sqlemp);
    $rowemp = mysqli_fetch_assoc($resultemp);

    //Query para descripcion de comprobante si es que filtro por tipo de comprobante
    if ($filtro=='tipocomp') {
        $sqltc = "SELECT descripcion FROM tipos_comprobantes where id=$tipocomp";
        $resulttc = mysqli_query($conn3,$sqltc);
        $rowtc = mysqli_fetch_assoc($resulttc);
    }
    
    class LIVAPDF extends FPDF{
        function Header(){
            global $rowemp;
            global $finicio;
            global $ffin;
            global $cinicio;
            global $cfin;
            global $filtro;
            global $rowtc;
            global $netogravadotot;
            global $ivatot;
            global $otrosimptot;
            global $totaltot;
            $this->SetFont('Arial','',12);
            $this->Cell(20,5,$rowemp['Nombre'],0,1,'L',0);
            $this->Cell(20,5,$rowemp['cuit'],0,0,'L',0);
            $this->SetFont('Arial','B',20);
            $this->Cell(220,5,'Libro IVA de ventas',0,0,'C',0);
            $this->SetFont('Arial','',12);
            $this->Cell(0,5,'Pagina '.$this->PageNo(),0,0,'C',0);
            $this->Ln();
            if ($filtro=='fecha') {
                $this->Cell(0,5,'Desde fecha: '.$finicio.' Hasta fecha: '.$ffin,0,0,'C',0);
            } elseif ($filtro=='tipocomp') {
                $this->Cell(0,5,'Comprobantes tipo: '.$rowtc['descripcion'],0,0,'C',0);
            } elseif ($filtro=='numcomp') {
                $this->Cell(0,5,'Desde comprobate Nro: '.$cinicio.' Hasta comprobate Nro: '.$cfin,0,0,'C',0);
            }
            $this->Ln(8);
            $this->SetFillColor(220,220,220);
            $this->Cell(170,6,'TRANSPORTE: ',0,0,'R',1);
            $this->Cell(25,6,'$'.$netogravadotot,0,0,'R',1);
            $this->Cell(25,6,'$'.$ivatot,0,0,'R',1);
            $this->Cell(25,6,'$'.$otrosimptot,0,0,'R',1);
            $this->Cell(25,6,'$'.$totaltot,0,0,'R',1);
            $this->Ln(7);
            
            $this->SetFont('Arial','',10);
            $this->SetFillColor(220,220,220);
            $this->Cell(20,5,'Fecha',0,0,'L',1);
            $this->Cell(30,5,'Tipo comp.',0,0,'L',1);
            $this->Cell(30,5,'Num comp.',0,0,'L',1);
            $this->Cell(60,5,'Cliente',0,0,'L',1);
            $this->Cell(30,5,'CUIT/DNI',0,0,'L',1);
            $this->Cell(25,5,'Neto gravado',0,0,'L',1);
            $this->Cell(25,5,'IVA',0,0,'L',1);
            $this->Cell(25,5,'Otros imp.',0,0,'L',1);
            $this->Cell(25,5,'Total',0,0,'L',1);
            $this->Ln();
        }

        function Footer(){
            global $netogravadotot;
            global $ivatot;
            global $otrosimptot;
            global $totaltot;
            $this->SetY(-15);
            $this->SetFillColor(220,220,220);
            $this->Cell(170,6,'TRANSPORTE: ',0,0,'R',1);
            $this->Cell(25,6,'$'.$netogravadotot,0,0,'R',1);
            $this->Cell(25,6,'$'.$ivatot,0,0,'R',1);
            $this->Cell(25,6,'$'.$otrosimptot,0,0,'R',1);
            $this->Cell(25,6,'$'.$totaltot,0,0,'R',1);
        }



    }
?>
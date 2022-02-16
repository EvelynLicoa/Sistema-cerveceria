<?php
    require 'fpdf181/fpdf.php';
    include 'dbh.php';
    
    session_start(); 
    
  

    $Id=$_SESSION['lotes_id'];

    $sqllote="SELECT * from lotes WHERE Id=$Id";
    $resultlote=mysqli_query($conn,$sqllote);
    $rowlote=mysqli_fetch_assoc($resultlote);

    $idcoccion=$rowlote['cocciones_id'];

    class TRAZAPDF extends FPDF{
        function Header(){
            global $rowlote;
            $this->SetFont('Arial','',20);
            $this->Cell(180,5,'Trazabilidad lote nro: '.$rowlote['id'],0,0,'C',0);
            $this->Ln(15);
        }

        function Footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',10);
            $this->Cell(0,5,'Pagina '.$this->PageNo(),0,0,'C',0);
        }
    }
?>
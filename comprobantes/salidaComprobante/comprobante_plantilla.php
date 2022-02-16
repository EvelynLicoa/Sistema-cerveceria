<?php
    require 'fpdf181/fpdf.php';

    class PDF extends FPDF{
        function Header(){
            //$this->Image('');
            $this->Ln(10);
        }
    }


?>
<?php





function getListasRep(){

  $estecod =  isset($_POST['estecod']) ? $_POST['estecod'] : "";


   $salida = "<tr><td></td><td> <button id='plusRow' class='btn btn-info'><span class='glyphicon glyphicon-plus' onclick='agregaformNew()'></span></button></td><td></td><td></td><td></td><td></td></tr>";
        
   return $salida;

    }
    


echo getListasRep();
     
     
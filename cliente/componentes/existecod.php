<?php





function getListasRep(){

  $boolean =  isset($_POST['boolean']) ? $_POST['boolean'] : "";

   $salida = "";
  
    if ($boolean) {
        $salida .= "<span id='span' class='fas fa-check'></span>";
   
    }else{
        $salida .= "<span id='span' class='fas fa-times input-group'></span>";
     
    }

    
return $salida;
}

echo getListasRep();
     
     
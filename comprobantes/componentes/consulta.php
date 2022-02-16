<?php




    function getListasRep(){

        
        
       $id =  isset($_POST['esteid']) ? $_POST['esteid'] : "";


       $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

       $stament = $conn->prepare('SELECT * FROM plandecuenta WHERE id=:id');
       $stament->bindParam(':id', $id);
       $stament->execute();
//        echo $stament->execute();
    //    $stament = null;
       
       
      $codigo = '';
      $numero = '';
//      $pepe = '';


      
       while ($fila = $stament->fetch()) {
                    $codigo = $fila['codigo'];
                    $numero = $fila['numero'];

            }

    
//    return $codigo; 
     $dad = $codigo;
     $level = $numero;

     $hijoCand = $dad;
     $thisReturn = 'no';

     $a = 1; 

     $YaExiste = 'true';



    
         while ($YaExiste == 'true') {
             if (($level == 1) || ($a>9)){
                 $hijoCand = $dad.'.'.$a; 
             }
             else{
                 $hijoCand = $dad.'.0'.$a;
             }
          
//             $YaExiste = 'false';
//             $thisReturn = $hijoCand;
        //************************************************************************************************* */
//             $conexion = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
             $stament = $conn->prepare('SELECT * FROM plandecuenta where codigo=:codigo');
             $stament->bindParam(':codigo', $hijoCand);
             $stament->execute();
             
             
                 if ($stament->rowCount() == 0) {
                    $YaExiste = 'false';
                    $thisReturn = $hijoCand;
//                      $level = $level++; 
                 }else{
                     $a = $a+1;	
                 }
             
//    
//             if ($stament->rowCount()>0) {
//                    $YaExiste = 'false';
//                    $thisReturn = $hijoCand;
                     // $level = $level++; 
//                 
//                 
//            $thisReturn = $hijoCand; 
           
         }




        return $thisReturn; 


    
    }

    echo getListasRep();







<?php 
    session_start();

//    $id =  isset($_POST['valor']) ? $_POST['valor'] : "";
    


function getListasRep(){

    if (isset($_POST['valor'])){
        $id=$_POST['valor'];

        $_SESSION['consulta']=$id;
    
        return $id; 

    }


    // $id=$_POST['valor'];

    // $_SESSION['consulta']=$id;
    
    // echo $id; 

}

        
        
        
        
        
        
        
        
        
        
        
        

//	echo $id;
        
//        echo "<script>
//                alert('$id');
//                return false; 
//            </script>";

 ?>
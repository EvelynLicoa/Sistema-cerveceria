
<?php


session_start(); 



    function DevolverArray(){

        $empresa_name = $_SESSION['empresa.nombre']; 

        $num_asiento =  isset($_GET['num_asiento']) ? $_GET['num_asiento'] : "";

        $tipo_asiento =  isset($_GET['tipo_asiento']) ? $_GET['tipo_asiento'] : "";

        // $fecha_contable =  isset($_POST['fecha_contable']) ? $_POST['fecha_contable'] : "";       


        // **************************************************************************************************************************

        // - LO PRIMERO QUE HAGO ES QUE ACTUALIZO EL TIPO DE ASIENTO CON EL QUE ME VINO, SEA CUAL SEA ESTE ASIENTO 

//        $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//        $stament = $conn->prepare("UPDATE asientoborrador SET asientoborrador.tipo_asiento =:tipo_asiento WHERE asientoborrador.num_asiento =:num_asiento");
//        $stament->bindParam(':tipo_asiento', $tipo_asiento);
//        $stament->bindParam(':num_asiento', $num_asiento);
//        $stament->execute();
//
//        $conn = null; 
       // **************************************************************************************************************************




    //    AHORA OBTENGO EL TIPO DE ASIENTO, YA SEA QUE HAGA ACTUALIZADO O NO 



        $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
        $query = "SELECT asientoborrador.tipo_asiento AS tipo FROM asientoborrador WHERE asientoborrador.num_asiento = $num_asiento LIMIT 1"; 
        $stament = $conn->query($query); 


        $res = $stament->fetch();

        $type= $res['tipo']; 

        $conn = null; 


// ********************************************************************************************************************************************
//
//        $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//
//
//        $queryFechCont = "SELECT asientoborrador.fecha_contable AS fecha FROM asientoborrador WHERE asientoborrador.num_asiento = $num_asiento LIMIT 1"; 
//        $stament = $conn->query($queryFechCont); 
//   
//        $res = $stament->fetch();
//
//        $fechaContable= $res['fecha']; 
//
//        $conn = null; 



// ********************************************************************************************************************************************



//        $connect = new PDO('mysql:host=localhost; dbname=sistemas_3', 'root', '');
//
//            if ($type == 'Asiento Apertura'){
//
//                $stament = $connect->prepare("UPDATE empresas SET empresas.fecha_Ini =:fechaContable WHERE empresas.nombre =:empresa_name");
//                $type = 1; 
//                $_SESSION['typeApertura'] = $type; 
//
//            }elseif($type == 'Asiento Cierre'){
//
//                $stament = $connect->prepare("UPDATE empresas SET empresas.fecha_Fin =:fechaContable WHERE empresas.nombre =:empresa_name");
//                $type = 9;
//                $_SESSION['typeCierre'] = $type; 
//            }
//
//            $stament->bindParam(':fechaContable', $fechaContable);
//            $stament->bindParam(':empresa_name', $empresa_name);
//            $stament->execute();
//
//            $connect = null; 

// ********************************************************************************************************************************************




//            $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//            $queryCant = "SELECT COUNT(*) AS cantidad FROM asientoborrador WHERE num_asiento =$num_asiento and okcarga = 1"; 
//
//            $stament = $conn->query($queryCant); 
//            $stament->execute();
//
//            $res = $stament->fetch();
//
//            $cantidad = $res['cantidad']; 
//
//            $conn = null; 
//
//                if($cantidad > 0){
//
//                    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//                    $stament = $conn->prepare("INSERT INTO asientodefinitivo (num_asiento, num_renglon, fecha_contable, cuenta, tipo_asiento, fecha_vto, fecha_op, descripcion, debe, haber)
//                    SELECT num_asiento, num_renglon, fecha_contable, cuenta, tipo_asiento, fecha_vto, fecha_op, descripcion, debe, haber
//                    FROM asientoborrador WHERE asientoborrador.num_asiento =:num_asiento");
//                    $stament->bindParam(':num_asiento', $num_asiento);
//                    $stament->execute();
//                    $conn = null; 
//        
//        
//
//                                        
//                    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//                    $stm = $conn->prepare("UPDATE asientoborrador SET asientoborrador.registrado = 1 WHERE asientoborrador.num_asiento = :num_asiento");
//                    $stm->bindParam(':num_asiento', $num_asiento);
//                    $stm->execute();
//                    $conn = null; 
//
//        
//        
//
//                } 


            // return 'ok'; 
            return json_encode($type);
}

echo DevolverArray(); 


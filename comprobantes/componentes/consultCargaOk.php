
<?php



function DevolverArray(){

    $num_asiento =  isset($_GET['seat']) ? $_GET['seat'] : "";
    //ACA CONSULTAR A LA TABLA BORRADORES Y VERIFICAR QUE ESE ASIENTO NO SE ENCUETRA CON "OKCARGA" 

    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
    $queryCant = "SELECT COUNT(*) AS cantidad FROM asientoborrador WHERE num_asiento =$num_asiento and okcarga = 1"; 

    $stament = $conn->query($queryCant); 
    $stament->execute();

    $res = $stament->fetch();

    $cantidad = $res['cantidad']; 

    $conn = null; 

        if($cantidad == 0){
                $valor = 0;  
        //RETORNAR EL NUMERO 0 DICIENDO QUE NO SE PUEDE PORQUE YA ESTA CARGADO
        }else{
            $valor = 1;
        }

        return json_encode($valor);
}

echo DevolverArray(); 


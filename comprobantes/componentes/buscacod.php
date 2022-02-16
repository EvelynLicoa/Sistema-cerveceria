<?php 

session_start();

//if (isset($_POST['valor'])) {
//    
//    $valor = $_POST['valor']; 
//    $_SESSION['consulta'] = $valor;
//    echo $valor;
//            echo "<script>
//                alert('$valor');
//                return false; 
//            </script>";
//}

$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

$salida = "";

$stament = $conn->prepare('SELECT * FROM plandecuenta');
//$stament = $conn->prepare('SELECT id, codigo, numero, nombre, tipo FROM plandecuenta');
$stament->execute();
                         


if ($stament->rowCount()>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr>
                                    <td>cod</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $stament->fetch()) {
    		$salida.="<tr>
                            <td>".$fila['codigo']."</td>
                        </tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;


?>


           


       
        
       
        
        
        
        
        
        
        
        
        
        
        
        
        
        



	

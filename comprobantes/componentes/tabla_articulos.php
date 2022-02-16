<?php

session_start(); 



//$empresaName = $_SESSION['empresa.nombre'];


$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
$query = "SELECT mayor.ult_fecha AS fecha FROM mayor";
$stament = $conn->prepare($query);
$stament->execute();

$res = $stament->fetch();

$fecha = $res['fecha'];

$setFecha = date("Y-m-d",strtotime($fecha."+ 1 days")); 

$conn = null; 


// unset($_SESSION['typeApertura']);

// unset($_SESSION['typeCierre']);


?>




<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
        <link rel="stylesheet" href="../../../estilos/estilos.css">
    </head>
 
    
    
<body class="body">
                          

    <div class="containerExt classext">

        <div class="containerInt classint">
        <br>

                <div class="classint">
                    <br>
                    <div id="mostrarNuevaTabla"></div>
                </div>
        </div>


    </div>
    <br><br>

</body>
</html>





<script type="text/javascript">
    $(document).ready(function () {

        $.ajax({
            url: 'componentes/getseat.php',
        })  
        .done(function(respuesta){
            toShow = JSON.parse(respuesta);

            $('#inputSeat').val(toShow); //muestro el numero de asiento 

        }) 
        .fail(function(respuesta){
            
        }) 
                //muestro POR DEFECTO la nuevaTabla
                $.ajax({
                        url: 'componentes/nuevaTabla.php',
                        success: function(respuesta) {
                            
                            $('#mostrarNuevaTabla').empty().html(respuesta);
                          
                        },
                        error: function() {
                            console.log("No se ha podido obtener la información");
                        }
                    });
        
             $('#myUl li').click(function () { 
                typeSeat = $(this).data('id');
                $('#inputTypeSeat').val(typeSeat); // Ley al input de TIPO DE ASIENTO EL TIPO DE ASIENTO SELECCIONADO  
             });
    });


</script>


<script type="text/javascript">

    $(document).ready(function () {

            $('#fechaContableNew').change(function () { 


                fechaContable = $('#fechaContableNew').val();      
                    
                $('#fechaOp_first').val(fechaContable); 
                $('#fechaVto_first').val(fechaContable); 
;

                $('#fechaOp_first').attr("min", fechaContable);

                $('#fechaVto_first').attr("min", fechaContable);
            });

    });
</script>

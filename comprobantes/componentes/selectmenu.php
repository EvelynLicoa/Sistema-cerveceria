

<?php



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <script src="../../lib/jquery/jquery-1.9.1.min.js"></script> 
    <link rel="stylesheet" href="../../estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="../../librerias/bootstrap/css/bootstrap.css">  
    <link rel="stylesheet" type="text/css" href="../../librerias/fonts/glyphicons-halflings-regular.woff2">
    <script src="../../estilos/estilos.css"></script>

    <title>Document</title>
</head>

<header>

    <!-- <div id="header">
                <ul class="nav navbar-nav">
            
                      <li><a class="a" href="../contabilidad.php">SALIR</a></li>
                        
                </ul>
    </div>     -->



    <div class="container">                                      
        <div class="dropdown">

            <button id ="reloadPage" class="btn btn-warning btn-lg btn-block dropdown-toggle" type="button" data-toggle="dropdown">SELECCIONAR<span class="caret"></span></button>
            <!-- <ul class="dropdown-menu"> -->
            <ul class="dropdown-menu navbar-nav">
                <li id="newseat" class="pointer"><a tabindex="-1">NUEVO ASIENTO</a></li>    
                <li class="dropdown-submenu">
                    <a id="returnseat" class="test pointer" tabindex="-1">RETOMAR ASIENTO<span class="caret"></span></a>

                        <ul id="numSeat" class="dropdown-menu">
                            <!-- ACA SE DIBUJA TODOS LOS LI....,  "dibujarListaSelect.php -->

                        </ul>
                </li>
            </ul>
    </div>        
</header>

<body>
    

</body>
</html>




<script>
    $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });

//  ************************* SI ELIJO DEL SELECTO RETORNAR ASIENTO, TENGO QUE DIBUJAR TODOS LOS ASIENTOS RETORNADO**************
    $('#returnseat').click(function () { 
            
            $.ajax({
                url: 'componentes/dibujarListaSelect.php',
                success: function(respuesta) {
                    
                    $('#numSeat').empty().html(respuesta);
                  
                },
                error: function() {
                    console.log("No se ha podido obtener la información");
                }
            });
            
        });    
        
        
// ************************* SI ELIJO DEL SELECT NUEVO ASIENTO LLAMO A TABLA ************************************************************* 


            $(document).ready(function(){

                $('#newseat').click(function () { 
                    //1- Lo primero que hago es cambiar el tipo de dato del input, DE TEXT A DATE
                    //2- Luego le quito la propuedad disabled
                      $('#fechaContableNew').val('');
                      $('#fechaContableNew').attr('type', 'date');
                      $('#fechaContableNew').prop('disabled', false);
                    
                  
                    $.ajax({
                        url: 'componentes/tabla.php',
                        success: function(respuesta) {

                            close_session(); 
                            
                            $('#tabla').empty().html(respuesta);
                          
                        },
                        error: function() {
                            console.log("No se ha podido obtener la información");
                        }
                    });
                });    


            });


</script>

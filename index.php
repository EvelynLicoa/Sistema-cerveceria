<?php

?>


<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="estilos/estiloscerveceria.css">
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
        
        <link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="librerias/fonts/glyphicons-halflings-regular.woff2">
        
        <link rel="stylesheet" type="text/css" href="librerias/select2/js/jquery-ui.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
         
        <!-- <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/iconos.css"> -->

    
    <!-- FECHA -->
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 

        
        <script src="lib/jquery/jquery-1.9.1.min.js"></script>
        <script src="js/funciones_generales.js"></script>
        <script src="librerias/bootstrap/js/bootstrap.js"></script>
        <script src="librerias/alertifyjs/alertify.js"></script>
        <script src="librerias/select2/js/select2.js"></script>
        <script src="librerias/datatable/jquery.dataTables.min.js"></script>
        
        <script src="librerias/datatable/dataTables.bootstrap.min.js"></script>
        
        <script src="librerias/select2/js/jquery-ui.js"></script>
   
       <script src='Zlibrerias/select2/js/mask/jquery.maskedinput.js'></script>

       <!-- --------- mask ------------- -->
       <!-- https://www.smartherd.com/mask-inputs-using-jquery-mask-plugin/ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<!-- FECHA -->
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        

<!----------------------->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cronometro/css/font-awesome.min.css">
    <link href="cronometro/css/main.css" rel="stylesheet">
 <!-----------------------> 

    </head>

<!--    <body class="FondoCerveza">-->
<body class="mainMadera">
        
        <nav class="navbar navbar-inverse navbar-static-top navegacion">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                        <a class="navbar-brand logo-principal" href="#"></a>
                        <img src="https://1000marcas.net/wp-content/uploads/2019/12/meta-logo.png" class="img-logo" alt="" width="50" height="50">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="insumos/insumos_index.php">Insumos</a></li>
                        <li><a href="ingredientes/ingredientes_index.php">Ingredientes</a></li>
                        <li><a href="cliente/clientes_index.php">Clientes</a></li>
                        <li><a href="proveedores/proveedores_index.php">Proveedores</a></li>
                        <li><a href="barriles/barriles_index.php">Barriles</a></li>
                        <li><a href="cocciones/cocciones_index.php">Cocciones</a></li>
                        <!--<li><a href="Index.html">Produccion/Lotes y Envases</a></li>-->
                        <!--<li><a href="ventas.html">Ventas de barriles con tal lote producido</a></li>-->
                        <li><a href="compras_ing/compras_ing_index.php">Compras ingredientes</a></li>
                        <li><a href="compras_insumos/compras_insumos_index.php">Compras insumos</a></li>
                        <!-- <li><a href="comprobantes/index_comprobante.php">Ventas</a></li> -->
                        <li><a href="trazabilidad/trazabilidad_index.php">Trazabilidad</a></li>
                       
                      
                    </ul>
                </div>
        </nav> 
       <h1 class="site-title text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> PRODUCCIÓN</h1>
    <!------------------------------------------->
    
     <div class="modal" id="deployCocciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">COCCIONES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_coccion"></div>    
                    </div>
                </div>
            </div>
    </div>
 <!------------------------------------------->
    
        <div>       

                <br><br>

            <div class="containerExt classext">

                <br><br><br>
                <div class="containerInt classint">
                <br>
                        <div class="classint">
                            <br>
                            <div id="encabezado"></div>

                   
                        </div>
                <br>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#encabezado').load('componentes/encabezado.php');
                
            });
        </script>
    </body>
     
</html>

     
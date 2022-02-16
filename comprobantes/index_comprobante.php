
<?php

// include_once 'componentes/value.php';

session_start(); 
  

  
?>


<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="../estilos/estilos.css">
        <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="../librerias/select2/css/select2.css">
        
        <link rel="stylesheet" type="text/css" href="../librerias/datatable/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../librerias/fonts/glyphicons-halflings-regular.woff2">
        
        <link rel="stylesheet" type="text/css" href="../librerias/select2/js/jquery-ui.css">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
         
        <!-- <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/iconos.css"> -->

    
    <!-- FECHA -->
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 

        
        <script src="../lib/jquery/jquery-1.9.1.min.js"></script>
        <script src="js_comprobantes/funciones.js"></script>
        <script src="../librerias/bootstrap/js/bootstrap.js"></script>
        <script src="../librerias/alertifyjs/alertify.js"></script>
        <script src="../librerias/select2/js/select2.js"></script>
        <script src="../librerias/datatable/jquery.dataTables.min.js"></script>
        
        <script src="../librerias/datatable/dataTables.bootstrap.min.js"></script>
        
        <script src="../librerias/select2/js/jquery-ui.js"></script>
   
       <script src='../librerias/select2/js/mask/jquery.maskedinput.js'></script>

       <!-- --------- mask ------------- -->
       <!-- https://www.smartherd.com/mask-inputs-using-jquery-mask-plugin/ -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<!-- FECHA -->
        <script src="js/bootstrap-datetimepicker.min.js"></script>
       

    </head>
    <header>
        <div id="header">
            <ul class="nav navbar-nav">
                <li><a class="btn btn-success btn-lg" onclick="functionDeploySeguimiento()">SEGUIMIENTO</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a class="a btn btn-primary btn-lg" href="../index.php" style="margin-left: 10px">SALIR</a></li>     
            </ul>
        </div>  

    </header>
   
    
    <body class="mainBody">
 

        <br><br><br>
    


        <div>       
            <!----------------------------------------------------------------------->
            <!--<div id="menuselect"></div>-->
            <!----------------------------------------------------------------------->
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
                    <!--<div id="tabla"></div>--> 
            </div>
           
            <div id="tabla"></div> 

        </div>
        
        <!-- ******************************************* -->

        <div class="modal" id="deployVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">SEGUIMIENTO BARRILES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_ventas"></div>    
                    </div>
                </div>
            </div>
        </div>
 
     <!--*********************************************************************************-->
        
        <!-- ******************************************* -->

        <div class="modal" id="deployClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">CLIENTES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_clientes"></div>    
                    </div>
                </div>
            </div>
        </div>
 
     <!--*********************************************************************************-->
        <div class="modal" id="deployBC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">BARRILES</h4>
                    </div>
                    <div class="modal-body">
                           <div id="tabladinamica"></div> 
                    </div>
                                            
                </div>
            </div>
        </div>
 
     <!--*********************************************************************************-->
     
      <div class="modal fade" id="deployPuntoVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">PUNTO VENTAS</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_puntoventas"></div>
                    </div>
                </div>
            </div>
        </div>
     <!--*********************************************************************************-->
     
         <div class="modal fade" id="deployPuntoVentas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">PUNTO VENTAS</h4>
                    </div>
                    <div class="modal-body">
                         <div id="tabladinamica_puntoventas"></div>
                    </div>
                </div>
            </div>
        </div>
     <!--*********************************************************************************-->
     
      <div class="modal" id="deployFormaPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">FORMA DE PAGO</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_forma_pago"></div>
                    </div>
                </div>
            </div>
        </div> 
     
     <!--*********************************************************************************-->
     
      <div class="modal fade" id="deployProvincias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">PROVINCIAS</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_provincias"></div>
                    </div>
                </div>
            </div>
        </div> 
     
     <!--*********************************************************************************-->
     
      <div class="modal fade" id="deployTComprobantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">TIPOS COMPROBANTES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_tcomprobantes"></div>
                    </div> 
                </div>
            </div>
        </div> 

       
        <!-- Modal para edicion de datos -->
        
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar datos</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="idplandecuenta" hidden="">
                
                <div  class="form-group">
                    <label>CÓDIGO PLAN</label>
                    <!-- <input type="text" id="codigoplanu"  class="form-control input-sm" disabled>    -->
                    <input type="text" id="codigoplanu"  class="form-control input-sm">       
                </div>
                    
                <div  class="form-group">
                    <label>NIVEL</label>
                    <!-- ¿PORQUE NO ME MUESTRA EL MALDITO NUMEROU? -->
                    <input type="text" id="numerou" class="form-control input-sm" disabled>      
                </div>
               
                <div  class="form-group">
                   <label>NOMBRE</label>
                   <input type="text" id="nombreu" class="form-control input-sm">        
                </div>
                
                <div  class="form-group">
                     <label>TIPO</label>
                     <input type="text" id="tipou" class="form-control input-sm">       
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">Guardar cambios</button>
            </div>
            </div>
        </div>
        </div>


        <!-- ******************************************** -->
        
        <script type="text/javascript">
            $(document).ready(function(){
//POR DEFECTO VOY A TENER EL MENU Y LA TABLA
//                $('#menuselect').load('componentes/selectmenu.php');
                $('#encabezado').load('componentes/encabezado.php');
                $('#tabla').load('componentes/tabla_articulos.php'); 
//                $('#punto_venta').focus();
            });
        </script>


        <script type="text/javascript">
           
           $(document).ready(function(){
                $('#closeform').click(function(){
                    
                    $('#deploy').val('');
                          jQuery(this).removeData('bs.modal');
                });
                
            });

        </script>
        
        
        <script>

            $(document).on('click', 'tbody .trColor', function () {
            $(this).addClass('activeColour').siblings().removeClass('activeColour');
            });  

        </script>

    </body>
    
</html>




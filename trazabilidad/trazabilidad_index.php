
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
        <script src="js_trazabilidad/funciones.js"></script>
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
<!--            <ul class="nav navbar-nav">
                <li><a class="btn btn-success btn-lg" href="../comprobantes/salidaComprobante/comprobante.php">EMITIR COMPROBANTE</a></li>
            </ul>-->
            <ul class="nav navbar-nav">
                <li><a class="a btn btn-primary btn-lg" href="../index.php" style="margin-left: 10px">Regresar</a></li>     
            </ul>
        </div>  

    </header>
   
    
    <body class="">

        <br><br><br>
    


        <div>       
            <!----------------------------------------------------------------------->
            <!--<div id="menuselect"></div>-->
            <!----------------------------------------------------------------------->
                <br><br>

            <div class="containerExt classext contenedor-trazabilidad">

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

        <div class="modal" id="deployCustomer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">CLIENTES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_customer"></div>    
                    </div>
                </div>
            </div>
        </div>
 
        <!-------------------------------------->
        
          <div class="modal" id="deployBarriles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">BARRILES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_barriles"></div>    
                    </div>
                </div>
            </div>
        </div>
        <!-- ******************************************** -->
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('#encabezado').load('componentes/encabezado.php');
            });
        </script>


        
        
        
        <!---------------------------------------------->
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






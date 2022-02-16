
<?php

    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $query = "SELECT insumos.* FROM insumos";



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

        <script src="../lib/jquery/jquery-1.9.1.min.js"></script>
               
               
        <script src="../compras_insumos/js_compras_insumos/funciones.js"></script>
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
      
    <!--*********************************************************************************************-->
   
    </head>
    <header>
        <div id="header">
            <ul class="nav navbar-nav">
                <li><a class="btn btn-primary btn-lg" href="../index.php">SALIR</a></li>
            </ul>
        </div>  
    </header>
  
    <br><br><br>
    <body class="mainBody">
        <div>     
            <!-- Aca dentro de este div, va aparecer algo. Ese algo aparece en javascript-->
            <div id="tabla_compras_insumos"></div>      
        </div>
        <form id="formModal"> 
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header fondoNegro">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">REGISTRO DE CLIENTES</h4>
                    </div>

                    <div class="modal-body fondoGris">    
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="id" name="id" class="form-control input-sm"  disabled>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label>INSUMO</label>
                            <select id="insumos_id" name="insumos_id" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php  }   ?>
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>FECHA SOLICITUD</label>
                            <input type="date" id="fecha_solicitud" name="fecha_solicitud" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>FECHA RECIBO</label>
                            <input type="date" id="fecha_recibo" name="fecha_recibo" class="form-control input-sm">
                        </div>
                           
                        <div  class="form-group">
                            <label>CANTIDAD</label>
                            <input type="text" id="cantidad" name="cantidad" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>MONTO</label>
                            <input type="text" id="monto" name="monto" class="form-control input-sm">
                        </div>
                        
                    </div>
                    <div class="modal-footer fondoNegro">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="btnguardar">Agregar</button>
                        <!-- <input type="submit" class="button" value="Crear" name="crear"> -->
                    </div>
                </div>
            </div>
        </div>
    <!--</div>-->     
    </form> 
       
        <!-- Modal para edicion de datos -->
        
        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header fondoNegro">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar datos</h4>
                </div>
                <div class="modal-body fondoGris">    
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="idu" name="idu" class="form-control input-sm"  disabled>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label>INSUMO</label>
                            <select id="insumos_idu" name="insumos_idu" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php  }   ?>
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>FECHA SOLICITUD</label>
                            <input type="date" id="fecha_solicitudu" name="fecha_solicitudu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>FECHA RECIBO</label>
                            <input type="date" id="fecha_recibou" name="fecha_recibou" class="form-control input-sm">
                        </div>
                           
                        <div  class="form-group">
                            <label>CANTIDAD</label>
                            <input type="text" id="cantidadu" name="cantidadu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>MONTO</label>
                            <input type="text" id="montou" name="montou" class="form-control input-sm">
                        </div>
                        
                    </div>
                <div class="modal-footer fondoNegro">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">Guardar cambios</button>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>


        <!-- ******************************************** -->
        
        <script type="text/javascript">
//           document.ready, es para que aparezca lo que sigue inmediatamente despues de leer el html
            $(document).ready(function(){
                $('#tabla_compras_insumos').load('componentes/tabla_compras_insumos.php'); 

            });
        </script>





        <script type="text/javascript">
           
           $(document).ready(function(){
                $('#closeform').click(function(){
                         
                    $('#formModal')[0].reset();
                    $('#span').remove();
                  
                });
                
            });
        </script>



        <script type="text/javascript">
            $(document).ready(function(){
                $('#btnguardar').click(function(){ //ANTES DE GUARDAR ARRIBA VERIFICO SI ESTAN TODOS LOS CAMPOS COMPLETOS, HABILITANDO BOTON


                    $(".trColor").removeClass("background-color", "#0420c2");

//******************************************************

//                $('#id').val(d[0]);
                insumos_id = $('#insumos_id').val();
                fecha_solicitud = $('#fecha_solicitud').val();
                fecha_recibo = $('#fecha_recibo').val();
                cantidad = $('#cantidad').val();
                monto = $('#monto').val();

//******************************************************

                     cadena="insumos_id=" + insumos_id +
                            "&fecha_solicitud=" + fecha_solicitud +
                            "&fecha_recibo=" + fecha_recibo +
                            "&cantidad=" + cantidad +
                            "&monto=" + monto;

                    
                    agregardatos(cadena);
                    
                    $('#formModal')[0].reset();
                    // $('#icono').hide();
                    $('#span').remove();
                });
                
                
                 $('#actualizadatos').click(function () { 
                      actualizaDatos();
                      
                 });
                
                
            });
     

        </script>


       
        
         <script type="text/javascript">
            $(document).ready(function(){
                // $('#icono').hide();

            $('#codigo').on('change', function(){    
               var estecod = 'estecod=' + $('#codigo').val();
                

                    $.ajax({
                        type: "POST",
                        url: "componentes/existecod.php",
                        data: estecod
                    })
                    .done(function(resultado){
                       $('#adherir').html(resultado)
                     })
                    .fail(function(resultado){
                        $('#adherir').html(resultado)
                        
                     })
                             
               
            });   
                
       
                
   
            });
        </script>


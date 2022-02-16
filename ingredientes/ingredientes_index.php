
<?php

    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    $query = "SELECT proveedores.* FROM proveedores ";

    
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
               
               
        <script src="../ingredientes/js_ingredientes/funciones.js"></script>
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
            <div id="tabla_ingredients"></div>      
        </div>
        <form id="formModal"> 
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header fondoNegro">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">REGISTRO DE INGREDIENTES</h4>
                    </div>
                    
                    <div class="modal-body fondoGris">   
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="id" name="id" class="form-control input-sm"  disabled>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label>NOMBRE</label>
                            <input type="text" id="nombre" name="nombre" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>PROVEEDOR</label>
                            <select id="proveedores_id" name="proveedores_id" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php  }   ?>
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>DESCRIPCIÓN</label>
                            <input type="text" id="descripcion" name="descripcion" class="form-control input-sm">
                        </div>
                           
                        <div  class="form-group">
                            <label>STOCK MIN.</label>
                            <input type="text" id="stock_min" name="stock_min" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>STOCK ACTUAL</label>
                            <input type="text" id="stock_actual" name="stock_actual" class="form-control input-sm">
                        </div>

                         <div  class="form-group">
                            <label>COSTO</label>
                            <input type="text" id="costo" name="costo" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>CANTIDAD</label>
                            <input type="text" id="cantidad" name="cantidad" class="form-control input-sm">
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
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDITAR DATOS</h4>
                    </div>
                <div class="modal-body fondoGris">
    <!--                <input type="text" id="idplandecuenta" hidden="">-->

                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <input type="text" id="idu"  class="form-control input-sm">       
                        </div>

                        <div  class="form-group">
                            <label>NOMBRE</label>
                            <!-- ¿PORQUE NO ME MUESTRA EL MALDITO NUMEROU? -->
                            <input type="text" id="nombreu" class="form-control input-sm">      
                        </div>
                    
                        <div  class="form-group">
                            <label>PROVEEDOR</label>
                            <select id="proveedores_idu" name="proveedores_idu" class="contenedor">
                                <option></option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php  }   ?>
                            </select>
                        </div>
                        
                        <div  class="form-group">
                           <label>DESCRIPCIÓN</label>
                           <input type="text" id="descripcionu" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                           <label>STOCK MIN.</label>
                           <input type="text" id="stock_minu" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                           <label>STOCK ACTUAL</label>
                           <input type="text" id="stock_actualu" class="form-control input-sm">        
                        </div>
                    
                        <div  class="form-group">
                            <label>COSTO</label>
                            <input type="text" id="costou" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                            <label>CANTIDAD</label>
                            <input type="text" id="cantidadu" class="form-control input-sm">        
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
                $('#tabla_ingredients').load('componentes/tabla_ingredientes.php'); 

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
                nombre = $('#nombre').val();
                proveedores_id = $('#proveedores_id').val();
                descripcion = $('#descripcion').val();
                stock_min = $('#stock_min').val();
                stock_actual = $('#stock_actual').val();
                costo = $('#costo').val();
                cantidad = $('#cantidad').val();

//******************************************************

                     cadena="nombre=" + nombre +
                            "&proveedores_id=" + proveedores_id +
                            "&descripcion=" + descripcion +
                            "&stock_min=" + stock_min +
                            "&stock_actual=" + stock_actual +
                            "&costo=" + costo +
                            "&cantidad=" + cantidad;

                    
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


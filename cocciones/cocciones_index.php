
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
               
               
        <script src="../cocciones/js_cocciones/funciones.js"></script>
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
                <li><a class="btn btn-primary btn-lg" href="../index.php">Regresar</a></li>
            </ul>
        </div>  
    </header>
  
   <br><br><br>
   <body class="mainBody">
        <div>     
            <!-- Aca dentro de este div, va aparecer algo. Ese algo aparece en javascript-->
            <div id="tabla_cocciones"></div>      
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
                            <label>TIPO RECETA</label>
                            <select id="tipo_receta" name="tipo_receta" class="contenedor">
                                    <option></option>
                                    <option value="Libro">1- Libro</option>  
                                    <option value="Casera">2- Casera</option>      
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>TIPO CERVEZA</label>
                            <input type="text" id="tipo_cerveza" name="tipo_cerveza" class="form-control input-sm">
                        </div>
                        
                        <div class="form-group">
                            <label>COLOR/EBC</label>
                            <select id="color" name="color" class="contenedor">
                                    <option></option>
                                    <option class="cuatro" value="4">EBC= 4</option>  
                                    <option class="seis" value="6">EBC= 6</option>
                                    <option class="ocho" value="8">EBC= 8</option>
                                    <option class="doce" value="12">EBC= 12</option>
                                    <option class="dieciseis" value="16">EBC= 16</option>
                                    <option class="veinte" value="20">EBC= 20</option>
                                    <option class="veintiseis" value="26">EBC= 26</option>
                                    <option class="treintaytres" value="33">EBC= 33</option>
                                    <option class="treintaynueve" value="39">EBC= 39</option>
                                    <option class="cuarentaysiete" value="47">EBC= 47</option>
                                    <option class="cincuentaysiete" value="57">EBC= 57</option>
                                    <option class="sesentaynueva" value="69">EBC= 69</option>
                                    <option class="setentaynueve" value="79">EBC= 79</option>
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>AMARGOR</label>
                            <input type="text" id="amargor" name="amargor" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DENSIDAD</label>
                            <input type="text" id="densidad" name="densidad" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO MACERADO</label>
                            <input type="text" id="tiempo_macerado" name="tiempo_macerado" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO HERVOR</label>
                            <input type="text" id="tiempo_hervor" name="tiempo_hervor" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO FERMENTACIÓN</label>
                            <input type="text" id="tiempo_ferm" name="tiempo_ferm" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO ENFRIAMIENTO</label>
                            <input type="text" id="tiempo_enfr" name="tiempo_enfr" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>FAVORITO</label>
                            <input type="text" id="favorito" name="favorito" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>PRECIO VENTA</label>
                            <input type="text" id="precio_venta" name="precio_venta" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DESCUENTO</label>
                            <input type="text" id="descuento" name="descuento" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>STOCK MIN.</label>
                            <input type="text" id="stock_min" name="stock_min" class="form-control input-sm">
                        </div>
  
                         <div  class="form-group">
                            <label>STOCK ACTUAL</label>
                            <input type="text" id="stock_actual" name="stock_actual" class="form-control input-sm">
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
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="idu" name="idu" class="form-control input-sm"  disabled>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label>NOMBRE</label>
                            <input type="text" id="nombreu" name="nombreu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIPO RECETA</label>
                            <select id="tipo_recetau" name="tipo_recetau" class="contenedor">
                                    <option></option>
                                    <option value="Libro">1- Libro</option>  
                                    <option value="Casera">2- Casera</option>      
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>TIPO CERVEZA</label>
                            <input type="text" id="tipo_cervezau" name="tipo_cervezau" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>COLOR/EBC</label>
                            <select id="coloru" name="coloru" class="contenedor">
                                    <option></option>
                                    <option class="cuatro" value="4">EBC= 4</option>  
                                    <option class="seis" value="6">EBC= 6</option>
                                    <option class="ocho" value="8">EBC= 8</option>
                                    <option class="doce" value="12">EBC= 12</option>
                                    <option class="dieciseis" value="16">EBC= 16</option>
                                    <option class="veinte" value="20">EBC= 20</option>
                                    <option class="veintiseis" value="26">EBC= 26</option>
                                    <option class="treintaytres" value="33">EBC= 33</option>
                                    <option class="treintaynueve" value="39">EBC= 39</option>
                                    <option class="cuarentaysiete" value="47">EBC= 47</option>
                                    <option class="cincuentaysiete" value="57">EBC= 57</option>
                                    <option class="sesentaynueva" value="69">EBC= 69</option>
                                    <option class="setentaynueve" value="79">EBC= 79</option>
                            </select>
                        </div>
                        
                        <div  class="form-group">
                            <label>AMARGOR</label>
                            <input type="text" id="amargoru" name="amargoru" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DENSIDAD</label>
                            <input type="text" id="densidadu" name="densidadu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO MACERADO</label>
                            <input type="text" id="tiempo_maceradou" name="tiempo_maceradou" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO HERVOR</label>
                            <input type="text" id="tiempo_hervoru" name="tiempo_hervoru" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO FERMENTACIÓN</label>
                            <input type="text" id="tiempo_fermu" name="tiempo_fermu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>TIEMPO ENFRIAMIENTO</label>
                            <input type="text" id="tiempo_enfru" name="tiempo_enfru" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>FAVORITO</label>
                            <input type="text" id="favoritou" name="favoritou" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>PRECIO VENTA</label>
                            <input type="text" id="precio_ventau" name="precio_ventau" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DESCUENTO</label>
                            <input type="text" id="descuentou" name="descuentou" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>STOCK MIN.</label>
                            <input type="text" id="stock_minu" name="stock_minu" class="form-control input-sm">
                        </div>
  
                         <div  class="form-group">
                            <label>STOCK ACTUAL</label>
                            <input type="text" id="stock_actualu" name="stock_actualu" class="form-control input-sm">
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
                $('#tabla_cocciones').load('componentes/tabla_cocciones.php'); 

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
                tipo_receta = $('#tipo_receta').val();
                tipo_cerveza = $('#tipo_cerveza').val();
                color = $('#color').val();
                amargor = $('#amargor').val();
                densidad = $('#densidad').val();
                tiempo_macerado = $('#tiempo_macerado').val();
                tiempo_hervor = $('#tiempo_hervor').val();
                tiempo_ferm = $('#tiempo_ferm').val();
                tiempo_enfr = $('#tiempo_enfr').val();
                favorito = $('#favorito').val();
                precio_venta = $('#precio_venta').val();
                descuento = $('#descuento').val();
                stock_min = $('#stock_min').val();
                stock_actual = $('#stock_actual').val();

//******************************************************

                     cadena="nombre=" + nombre +
                            "&tipo_receta=" + tipo_receta +
                            "&tipo_cerveza=" + tipo_cerveza +
                            "&color=" + color +
                            "&amargor=" + amargor +
                            "&densidad=" + densidad +
                            "&tiempo_macerado=" + tiempo_macerado +
                            "&tiempo_hervor=" + tiempo_hervor +
                            "&tiempo_ferm=" + tiempo_ferm +
                            "&tiempo_enfr=" + tiempo_enfr +
                            "&favorito=" + favorito +
                            "&precio_venta=" + precio_venta +
                            "&descuento=" + descuento +
                            "&stock_min=" + stock_min +
                            "&stock_actual=" + stock_actual;

       
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
               $("select[name=color]").change(function(){
           
               classColor = ($("#color option:selected").attr('class'));               
              
               datos = $('#color').attr('class').split(' ').join('.');
               d = datos.split('.');
               colorActual = d[1];
               
               //si el color del select es distito al seleccionado...entonces elimino el color actual y le doy el nuevo color 
               if(colorActual != classColor){
                  $("#color").removeClass(colorActual);
                  $("#color").addClass(classColor);
               }

                }); 
                
//                **********************************************************
                  $("select[name=coloru]").change(function(){
                   classColor = ($("#coloru option:selected").attr('class'));               
              
                    datos = $('#coloru').attr('class').split(' ').join('.');
                    d = datos.split('.');
                    colorActual = d[1];

                    //si el color del select es distito al seleccionado...entonces elimino el color actual y le doy el nuevo color 
                    if(colorActual != classColor){
                       $("#coloru").removeClass(colorActual);
                       $("#coloru").addClass(classColor);
                    }

                }); 
                
             });
        </script>



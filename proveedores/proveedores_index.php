
<?php




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
               
               
        <script src="../proveedores/js_proveedores/funciones.js"></script>
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
                <li><a class="btn btn-info btn-lg" href="../index.php">Regresar</a></li>
            </ul>
        </div>  
    </header>
  
    <br><br><br>
    <body class="mainBody">
        <div>     
            <!-- Aca dentro de este div, va aparecer algo. Ese algo aparece en javascript-->
            <div id="tabla_prov"></div>      
        </div>
        <form id="formModal"> 
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header fondoNegro">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">REGISTRO DE TIPOS COMPROBANTES</h4>
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
                            <label>DOCUMENTO</label>
                            <input type="text" id="documento" name="documento" class="form-control input-sm">
                        </div>
                           
                        <div  class="form-group">
                            <label>TELÉFONO</label>
                            <input type="text" id="telefono" name="telefono" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>EMAIL</label>
                            <input type="text" id="email" name="email" class="form-control input-sm">
                        </div>

                         <div  class="form-group">
                            <label>DIRECCIÓN</label>
                            <input type="text" id="direccion" name="direccion" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>LOCALIDAD</label>
                            <input type="text" id="localidad" name="localidad" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>COD. POSTAL</label>
                            <input type="text" id="codPostal" name="codPostal" class="form-control input-sm">
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
                           <label>DOCUMENTO</label>
                           <input type="text" id="documentou" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                           <label>TELÉFONO</label>
                           <input type="text" id="telefonou" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                           <label>EMAIL</label>
                           <input type="text" id="emailu" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                            <label>DIRECCIÓN</label>
                            <input type="text" id="direccionu" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                            <label>LOCALIDAD</label>
                            <input type="text" id="localidadu" class="form-control input-sm">        
                        </div>

                        <div  class="form-group">
                            <label>COD. POSTAL</label>
                            <input type="text" id="codPostalu" class="form-control input-sm">        
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
                $('#tabla_prov').load('componentes/tabla_proveedores.php'); 

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
                documento = $('#documento').val();
                telefono = $('#telefono').val();
                email = $('#email').val();
                direccion = $('#direccion').val();
                localidad = $('#localidad').val();
                codPostal = $('#codPostal').val();

//******************************************************

                    cadena="nombre=" + nombre +
                            "&documento=" + documento +
                            "&telefono=" + telefono +
                            "&email=" + email +
                            "&direccion=" + direccion +
                            "&localidad=" + localidad +
                            "&codPostal=" + codPostal;
                    
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


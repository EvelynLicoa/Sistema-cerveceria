
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
               
               
        <script src="../barriles/js_barriles/funciones.js"></script>
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
            <div id="tabla_barril"></div>      
        </div>
        <form id="formModal"> 
     <!--<div class="form-group has-error">--> 
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header fondoNegro">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">REGISTRO DE BARRILES</h4>
                    </div>

                    <div class="modal-body fondoGris">    
                        <div  class="form-group" hidden>
                            <label>ID</label>
                            <div class="input-group">
                                <input type="text" id="id" name="id" class="form-control input-sm"  disabled>
                            </div>
                        </div>

                        <div  class="form-group">
                            <label>CODIGO</label>
                            <input type="text" id="codigo" name="codigo" class="form-control input-sm">
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
                            <label>CAPACIDAD</label>
                            <input type="text" id="capacidad" name="capacidad" class="form-control input-sm">
                        </div>
                           
                        <div  class="form-group">
                            <label>LOCALIZACIÓN</label>
                            <input type="text" id="localizacion" name="localizacion" class="form-control input-sm">
                        </div> 
                        
                        <div  class="form-group">
                            <label>LLENO</label>
                            <select id="lleno" name="lleno" class="contenedor">
                                    <option></option>
                                    <option value="1">SI</option>  
                                    <option value="0">NO</option>      
                            </select>
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
                            <label>CODIGO</label>
                            <input type="text" id="codigou" name="codigou" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>PROVEEDOR</label>
                            <select id="proveedores_idu" name="proveedores_idu" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php  }   ?>
                            </select>
                        </div>
                        <div  class="form-group">
                            <label>CAPACIDAD</label>
                            <input type="text" id="capacidadu" name="capacidadu" class="form-control input-sm">
                        </div>
                           
                        <div  class="form-group">
                            <label>LOCALIZACIÓN</label>
                            <input type="text" id="localizacionu" name="localizacionu" class="form-control input-sm">
                        </div> 
                     
                        <div  class="form-group">
                            <label>LLENO</label>
                            <select id="llenou" name="llenou" class="contenedor">
                                    <option></option>
                                    <option value="1">SI</option>  
                                    <option value="0">NO</option>      
                            </select>
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
                $('#tabla_barril').load('componentes/tabla_barril.php'); 

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
                codigo = $('#codigo').val();
                proveedores_id = $('#proveedores_id').val();
                capacidad = $('#capacidad').val();   
                localizacion = $('#localizacion').val();
                lleno = $('#lleno').val();
//******************************************************

                     cadena="codigo=" + codigo +
                            "&proveedores_id=" + proveedores_id +
                            "&capacidad=" + capacidad +
                            "&localizacion=" + localizacion +
                            "&lleno=" + lleno;

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


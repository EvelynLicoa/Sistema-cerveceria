
<?php

    $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
    
    $query1 = "SELECT tipos_responsable.* FROM tipos_responsable ";
    
    $query2 = "SELECT provincias.* FROM provincias ";

//    $descripcion = utf8_encode($array['descripcion']);

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
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

        <script src="../lib/jquery/jquery-1.9.1.min.js"></script>
               
               
        <script src="js_clientes/funciones.js"></script>
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
                <li><a class="btn btn-success btn-lg" onclick="functionDeployAuditoriaCustomer()">AUDITORIA CLIENTES</a></li>
            </ul>
            
            <ul class="nav navbar-nav">
                <li><a class="btn btn-warning btn-lg" onclick="functionDeployCustomerAuditory()" style="margin-left: 10px">HABILITAR CLIENTES</a></li>
            </ul>
           
            <ul class="nav navbar-nav">
                <li><a class="btn btn-primary btn-lg" href="../index.php" style="margin-left: 10px">SALIR</a></li>
            </ul>
        </div>  
    </header>
  
    <br><br><br>
    <body class="mainBody">
        <div>     
            <!-- Aca dentro de este div, va aparecer algo. Ese algo aparece en javascript-->
            <div id="tabla_customer"></div>      
        </div>
        <form id="formModal" class= "needs-validation" novalidate>
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
                            <label>NÚMERO</label>
                            <div class="input-group">
                                <input type="text" id="numero" name="numero" class="form-control input-sm">
                                <div class="input-group-addon" id="adherirOkeyNum">

                                </div>
                            </div>
                        </div>
                       
                        <div  class="form-group">
                            <label>NOMBRE</label>
                            <input type="text" id="nombre" name="nombre" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DOMICILIO</label>
                            <input type="text" id="domicilio" name="domicilio" class="form-control input-sm">
                        </div>
                        
                         <div  class="form-group">
                            <label>CUIT</label>
                            <div class="input-group">
                                <input type="text" id="cuit" name="cuit" class="form-control input-sm">
                                <div class="input-group-addon" id="adherir">
                                    
                                </div>
                            </div>
                        </div>
                         <div  class="form-group">
                            <label>TIPO RESPONSABLE</label>
                            <select id="tipos_responsable_id" name="tipos_responsable_id" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query1) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo utf8_encode($row['descripcion']); ?></option>
                                <?php  }   ?>
                            </select>
                         </div>
                        
                        <div  class="form-group">
                            <label>PROVINCIAS</label>
                            <select id="provincias_id" name="provincias_id" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query2) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo utf8_encode($row['descripcion']); ?></option>
                                <?php  }   ?>
                            </select>
                        </div>

                        <div  class="form-group">
                            <label>LOCALIDAD</label>
                            <input type="text" id="localidad" name="localidad" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>COD. POSTAL</label>
                            <input type="text" id="cod_post" name="cod_post" class="form-control input-sm">
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
                            <label>NÚMERO</label>
                            <input type="text" id="numerou" name="numerou" class="form-control input-sm" disabled>
                        </div>
                        
                        <div  class="form-group">
                            <label>NOMBRE</label>
                            <input type="text" id="nombreu" name="nombreu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>DOMICILIO</label>
                            <input type="text" id="domiciliou" name="domiciliou" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>CUIT</label>
                            <div class="input-group">
                                <input type="text" id="cuitu" name="cuitu" class="form-control input-sm" disabled>
<!--                                <div class="input-group-addon" id="adheriru">
                                    
                                </div>-->
                            </div>
                        </div>
                        
                         <div  class="form-group">
                            <label>TIPO RESPONSABLE</label>
                            <select id="tipos_responsable_idu" name="tipos_responsable_idu" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query1) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo utf8_encode($row['descripcion']); ?></option>
                                <?php  }   ?>
                            </select>
                         </div>
                        
                        <div  class="form-group">
                            <label>PROVINCIAS</label>
                            <select id="provincias_idu" name="provincias_idu" class="contenedor">
                                <option>Seleccionar</option>
                               <?php 
                                    foreach ($conn->query($query2) as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo utf8_encode($row['descripcion']); ?></option>
                                <?php  }   ?>
                            </select>
                        </div>

                        <div  class="form-group">
                            <label>LOCALIDAD</label>
                            <input type="text" id="localidadu" name="localidadu" class="form-control input-sm">
                        </div>
                        
                        <div  class="form-group">
                            <label>COD. POSTAL</label>
                            <input type="text" id="cod_postu" name="cod_postu" class="form-control input-sm">
                        </div>
                                   
                    </div>
                    <div class="modal-footer fondoNegro">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="actualizadatos">Actualizar</button>
                        <!-- <input type="submit" class="button" value="Crear" name="crear"> -->
                    </div>
            </div>
            </div>
        </div>
        
             <!--*********************************************************************************-->
      <div class="modal fade" id="deployClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">HABILITAR CLIENTES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_clientes"></div>
                    </div>
                </div>
            </div>
        </div> 
     <!--*********************************************************************************-->

            <div class="modal fade" id="deployAuditoriaClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" id="widthModal" role="document">
                <div class="modal-content">
                    <div>
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel" align="center">AUDITORIA SOBRE CLIENTES</h4>
                    </div>
                            <div class="modal-body">
                                <div id="tabladinamica_auditoria_clientes"></div>
                            </div>
                </div>
            </div>
        </div>   
      
     <!--*********************************************************************************-->
     
     
     
     
     
     
     
     
     
    </body>
</html>


        <!-- ******************************************** -->
        
        <script type="text/javascript">
//           document.ready, es para que aparezca lo que sigue inmediatamente despues de leer el html
            $(document).ready(function(){
             
            $('#tabla_customer').load('componentes/tabla_clientes.php'); 

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
                
                numero = $('#numero').val();
                nombre = $('#nombre').val();
                domicilio = $('#domicilio').val();
                cuit = $('#cuit').val();
                tipos_responsable_id = $('#tipos_responsable_id').val();  
                provincias_id = $('#provincias_id').val();
                localidad = $('#localidad').val();
                cod_post = $('#cod_post').val();      
      
                //*******************************************************

                     cadena="numero=" + numero +
                            "&nombre=" + nombre +
                            "&domicilio=" + domicilio +
                            "&cuit=" + cuit +
                            "&tipos_responsable_id=" + tipos_responsable_id +
                            "&provincias_id=" + provincias_id +
                            "&localidad=" + localidad +
                            "&cod_post=" + cod_post;

                    
                    agregardatos(cadena);
                    
                    $('#formModal')[0].reset();
                });
                
                
                 $('#actualizadatos').click(function () { 
                      actualizaDatos();
                      
                 });
                
                
            });
     

        </script>


       
        
         <script type="text/javascript">
            $(document).ready(function(){
                // $('#icono').hide();

            $('#cuit').on('keyup', function(){    
                
                if($("#cuit").val().length == 13){
                
                    cuit = $('#cuit').val();

                    boolean = validarCuit(cuit);
                                       
//                    alert(boolean);
//                    return false;
                    
                    if(boolean == true){
                        $('#adherir').html("<span id='span' class='fas fa-check'></span>")
                    }else{
                        $('#adherir').html("<span id='span' class='fas fa-times input-group'></span>")
                    }
                   

                }     

                });   
            });
            
//-------------------------------------------------------------------------------------------
            $('#numero').on('keyup', function(){    
                
                if($("#numero").val().length > 2){
               
                    functionValidarNumero();
                }                   
            });   

   
            
//-------------------------------------------------------------------------------------------       

            $('#cuitu').on('keyup', function(){    
                
                if($("#cuitu").val().length == 13){
                
                    cuit = $('#cuitu').val();

                    boolean = validarCuit(cuit);
                                       
//                    alert(boolean);
//                    return false;
                    
                    if(boolean == true){
                        $('#adheriru').html("<span id='span' class='fas fa-check'></span>")
                    }else{
                        $('#adheriru').html("<span id='span' class='fas fa-times input-group'></span>")
                    }
                   

                }     

                });   

        </script>
        
        <script type="text/javascript">
            $(document).ready(function(){
               $("#cuit").mask("99-99999999-9");
               $("#cuitu").mask("99-99999999-9");
            });
        </script>

        <script type="text/javascript">
        $(document).ready(function () { 
            $ ("#modalNuevo").on( 'shown.bs.modal' , function () { 

            $ (this).find('#numero').focus(); 

            }); 

        }); 
        </script>
        
<!--         <script type="text/javascript">
           
           $(document).ready(function(){
              $("#provinciaaa").autocomplete({
                source: "componentes/search.php",
                minLength: 1
             });     
            });
        </script>-->
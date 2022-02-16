<?php

  session_start(); 

  include '../../comprobantes/salidaComprobante/dbh.php';   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
<!-- 
    
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">  
    <link rel="stylesheet" type="text/css" href="../librerias/fonts/glyphicons-halflings-regular.woff2">
    <script src="../lib/jquery/jquery-1.9.1.min.js"></script> 
    <script src="../estilos/estilos.css"></script> -->

      <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <script src="../../lib/jquery/jquery-1.9.1.min.js"></script> 
    <script src="../js_comprobantes/funciones.js"></script>

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <link rel="stylesheet" href="../../estilos/estilos.css">

    <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <link rel="stylesheet" href="../../librerias/bootstrap/css/bootstrap.min.css">

    <script src="../../librerias/bootstrap/js/bootstrap.min.js"></script>

    <script src="../../librerias/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <link rel="stylesheet" href="../../librerias/bootstrap-datepicker/css/bootstrap-datepicker.css">

        <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

    <link rel="stylesheet" href="../../librerias/datetimepicker/css/bootstrap-datetimepicker.css">

    <script src="../../librerias/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>



    
</head>

<header>
        <div id="header">
                    <ul class="nav navbar-nav">

                        <li><a class="btn btn-primary btn-lg" href="../../comprobantes/../facturacion.php">SALIR</a></li>
    
                            
                    </ul>
        </div>  
Z
 <!-- --------------------------BODY--------------------------- -->

  <body class="mainBlue">
  <div class="logoContornoWhite">
            <div class="logo">
                <div class="nombreEmpresa">
                    <?php echo 'EMPRESA: '.'"'.$_SESSION['empresa.nombre'].'"';?>
                    <br>
                    <br>
                    <?php echo 'USUARIO: '.'"'.$_SESSION['usuario'].'"';?>
                    
                </div>
            </div>
        </div>
   
      <style>
      th{
        padding-right: 20px;
      }  
      td{
          padding-right: 20px;
          overflow: hidden;
          }
      .td1{
        size: 300px;
      }
      body{
        max-width: 1000px;
      }
    </style>

    <br><br>
    
    <!----------------------------------------------------->

    <div class="container">                                      
        <div class="dropdown">

            <button id ="reloadPage" class="btn btn-warning btn-lg btn-block dropdown-toggle active" type="button" data-toggle="dropdown">FILTRAR POR:<span class="caret"></span></button>
            <!-- <ul class="dropdown-menu"> -->
            <ul class="dropdown-menu navbar-nav">
                <li id="fechas" class="pointer"><a tabindex="-1">FECHAS</a></li>    
                <li id="num_comprobantes" class="pointer"><a tabindex="-1">NÚM. COMPROBANTE</a></li>  
                <li id="tipo_comprobante" class="pointer"><a tabindex="-1">TIPO COMPROBANTE</a></li>  
                
            </ul>
    </div> 
</div> 
    
    <!------------------------------------------------------->
</header>
     
<div id="divFechas" class="container-fluid" hidden>
    <br>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">  
                <div class="input-group">
                  <div class="input-group">   
                    <span id="spanBlack" class="input-group-addon">Desde: </span>  
                    <input id="fecha1" type="date" class="input-lg form-control" onChange="activeBtnFiltrarFechas()"/>
                    <span id="spanBlack" class="input-group-addon">hasta: </span>
                    <input id="fecha2" type="date" class="input-lg form-control" onChange="activeBtnFiltrarFechas()"/>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="divNum_comprobantes" class="container-fluid" hidden>
    <br>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">  
                <div class="input-group">
                  <div class="input-daterange input-group" id="datepicker">   
                    <span id="spanBlack" class="input-group-addon">Desde: </span>  
                    <input id="num_comprobante1" type="text" class="input-lg form-control" name="start" size="2" onKeyup="activeBtnFiltrarComprobantes()"/>
                    <span id="spanBlack" class="input-group-addon">hasta: </span>
                    <input id="num_comprobante2" type="text" class="input-lg form-control" name="end" size="2" onKeyup="activeBtnFiltrarComprobantes()"/>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="divTipo_comprobante" class="container-fluid" hidden> 
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">  
                <div class="input-group">
                    <span id="spanBlack" class="input-group-addon">TIPO COMPROBANTE: </span>
                    <input id="tipo_comprobante_dos" type="text" class="form-control input-lg" onkeyup="functionDeployTipoCompDos()">  
            <!--<input id="id_dos" type="text" class="form-control input-lg" hidden>--> 
                </div>
            </div>
        </div>   
    </div> 
</div> 
<div class="form-group" hidden>  
        <div class="input-group col-xs-5">
           <input id="id_dos" type="text" class="form-control input-lg" hidden> 

        </div>
</div>   
                
               
<div id="divBtnFiltrar" class="col-sm-3" hidden>
  <button id="btnFiltrar" type="text" class="btn btn-success btn-lg">Filtrar</button>
</div>

      <!----------------------------------------------------------------------------------------------------->
      
        <div class="modal fade" id="deployTComprobantesDos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="closeform" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">TIPOS COMPROBANTES</h4>
                    </div>
                    <div class="modal-body">
                        <div id="tabladinamica_tcomprobantes_dos"></div>
                    </div> 
                </div>
            </div>
        </div> 

     
      <div id="listarMayCuentas"></div>

  </body>

</html>





<script type="text/javascript">
         
 $(document).ready(function () {

     $('#reloadPage').click(function () { 
        $('#fecha1').val(''); 
        $('#fecha2').val(''); 
      
        $('#num_comprobante1').val('');
        $('#num_comprobante2').val('');
      
        $('#tipo_comprobante_dos').val('');
         
     });
//     ---------------------------------------------------------------

    $('#fechas').click(function () { 
       $('#divFechas').prop('hidden', false);   
       $('#divNum_comprobantes').prop('hidden', true); 
       $('#divTipo_comprobante').prop('hidden', true);  
       
            $('#fecha1').focus();
   });
   
    $('#num_comprobantes').click(function () {
       $('#divNum_comprobantes').prop('hidden', false); 
       $('#divFechas').prop('hidden', true); 
       $('#divTipo_comprobante').prop('hidden', true);
       
            $('#num_comprobante1').focus();
   });
   
    $('#tipo_comprobante').click(function () { 
       $('#divTipo_comprobante').prop('hidden', false);    
       $('#divFechas').prop('hidden', true);   
       $('#divNum_comprobantes').prop('hidden', true);
       
             $('#tipo_comprobante_dos').focus();
   });
   
//   -------------------------------------------------------------------------
 
     
  
  $('.fj-date').datepicker({
      format: "dd/mm/yyyy",
      maxViewMode: 2,
      calendarWeeks: true
  });



  $('#btnFiltrar').click(function () { 
  // $('#modal-date').modal();
      fecha1 = $('#fecha1').val(); 
      fecha2 = $('#fecha2').val(); 
      
      num_comprobante1 = $('#num_comprobante1').val();
      num_comprobante2 = $('#num_comprobante2').val();
      
      tipo_comprobante = $('#id_dos').val();
      


//      console.log(fecha1);
//      console.log(fecha2);

      cadena = "fecha1=" + fecha1 + 
               "&fecha2=" + fecha2 +
               "&num_comprobante1=" + num_comprobante1 +
               "&num_comprobante2=" + num_comprobante2 +
               "&tipo_comprobante=" + tipo_comprobante;

               
//
//       alert(cadena);
//       return false; 

      $.ajax({
        type: "GET",
        url: "setInSession.php",
        data: cadena,
        })
        .done(function(resultado){
//           res = JSON.parse(resultado);
//           alert(res);
//           return false;
          window.location.href = "Libroiva.php";
          
            
        })
        .fail(function(resultado){
          console.log('UN PROBLEMIN')
        });


    
     
   });
 



});

</script>




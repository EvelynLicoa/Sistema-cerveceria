<?php

session_start(); 



// unset($_SESSION['typeApertura']);

// unset($_SESSION['typeCierre']);


?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
        <link rel="stylesheet" href="../estilos/estilos.css">
    </head>
 <body class="body">
                          

    <div class="containerExt classext">

        <div class="containerInt classint">
        <br>

                <div class="classint">
                <br>
                <div class="col-sm-12">
                        <h2 align="center">DETALLE DE CUENTAS</h2>
                        <!--<button id="show" type="text">MOSTRAR</button>--> 
                    <div class="row">
                        <table class="table table-condensed table-bordered classTable" id="tablaDinamicaLoad">
                            <thead>
                                <tr>
                                    <td hidden>ID</td>
                                    <!-- <td>Nº RENGLON</td> -->
                                    <td>CUENTA</td>
                                    <td></td>
                                    <td>NOMBRE DE CUENTA</td>
                                    <td>DESCRIPCIÓN</td>
                                    <td>FECHA OPERACIÓN</td>
                                    <td>FECHA VENCIMIENTO</td>
                                    <td>DEBE</td>
                                    <td>HABER</td>
                                    <td></td>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
                    //LA query VA A SER SEGUN EL NUMERO QUE SELECCIONO EN EL index_asiento.php


            
                                $num_asiento = $_SESSION['asiento'];

    
                                
            //                                        echo Console::log($value);
                            //MAS ADELANTE LO HAGO CON UN LIKE ...PERO 
                            
  

    
                                $query = "SELECT COUNT(*) AS cantidad FROM asientoborrador WHERE asientoborrador.num_asiento= :num_asiento";
                                $stament = $conn->prepare($query);
                                $stament->bindParam(':num_asiento', $num_asiento);
                                $stament->execute(); 
                                $res = $stament->fetch();
                                $totalReg = $res['cantidad'];

                                $stament = null; 

                                // $totalReg = 3;

                                // ------------------------------------------------------------------------------------------------------------------------------

                                $query = "SELECT asientoborrador.*, plandecuenta.nombre, plandecuenta.codigo FROM asientoborrador INNER JOIN plandecuenta
                                ON asientoborrador.cuenta=plandecuenta.id WHERE asientoborrador.num_asiento= :num_asiento";
                                $stament = $conn->prepare($query);
                                $stament->bindParam(':num_asiento', $num_asiento);
                                $stament->execute();

                                // ---------------------------------------------------------------------------------------------------------------------------------

                                $contador = 1; 
                                     //COMINEZO DEL FOR




                                foreach ($stament as $array) {
                                    $tipo_asiento = $array['tipo_asiento'];



                                    $fecha_operacion = $array['fecha_op']; 
                                    $f = explode('-', $fecha_operacion);
                                    $fecha_op = $f[2]."-".$f[1]."-".$f[0];

                                    $fecha_vencimiento = $array['fecha_op']; 
                                    $f = explode('-', $fecha_vencimiento);
                                    $fecha_vto = $f[2]."-".$f[1]."-".$f[0];

                                    $esta_FechaContable = $array['fecha_contable']; 
                                    $f = explode('-', $esta_FechaContable);
                                    $fecha_contable = $f[2]."-".$f[1]."-".$f[0];

                                    echo "<script>
                                        fecha = '$fecha_contable';
                                        tipo_asiento= '$tipo_asiento';
                                        $('#fechaContableNew').val(fecha);  
                                        $('#inputTypeSeat').val(tipo_asiento);

                                    
                                   </script>";

                                   $datos = $array[0] . "||" .
                                   $array[1] . "||" .
                                   $array[2] . "||" .
                                   $array[3] . "||" .
                                   $array[4] . "||" .
                                   $array[5] . "||" .
                                   $array[6] . "||" .
                                   $array[7] . "||" .
                                   $array[8] . "||" .
                                   $array[9] . "||" .
                                   $array[10] . "||" .
                                   $array[11] . "||" .
                                   $array[12] . "||" .
                                   $array[13] . "||" .
                                   $array[14] . "||" .
                                   $array[15] . "||" .
                                   $array[16] . "||" .
                                   $array[17] . "||" .
                                   $array[18] . "||" .
                                   $array[19];


                                    
            
                                    // fechaContableReturn

                                    //No se porque el array $datos NO PUEDE SER ENVIADO EN EL PHP DE ARRIBA, DONDE "Agrego nuevo" 
                                            ?>

                            
                                                <tr id="row_<?php echo $array['id_sw']; ?>" class="classTable" value="row_<?php echo $array['id_sw']; ?>">
                                                <!-- <tr id="row_first"> -->
                                                        <td hidden>
                                                             <input type="text" id="id_first" value="<?php echo $array['id']; ?>" disabled class="inpGreen">
                                                        
                                                        </td>
                                              
                                                        <td>
                                                             <input type="text" id="deploy_first" value="<?php echo $array['codigo']; ?>" disabled class="inpGreen">
                                                        
                                                        </td>
                                                        <?php
                                                           if($contador == $totalReg){?>
                                                            <td>
                                                                <button id="first_plusReturn" class="btn btn-info" onclick="addRowReturn('<?php echo $datos ?>')"><span class="glyphicon glyphicon-plus"></span></button>
                                                            </td>
                                                                
                                                           <?php }else{ ?>
                                                            <td>
                                                                <button disabled class="btn btn-info" onclick="addRowReturn()"><span class="glyphicon glyphicon-plus"></span></button>
                                                            </td>

                                                            <?php }; ?>    
                                                  
                                                        <td>
                                                                <input type="text" id="name_first" value="<?php echo $array['nombre']; ?>" disabled class="inpGreen">
                                                        </td>
                                                        <td>
                                                                <input type="text" id="" value="<?php echo $array['descripcion']; ?>" disabled class="inpGreen">
                                                        </td>
                                                        <td>
                                                                <input type="text" id="" value="<?php echo $fecha_op; ?>" disabled class="inpGreen">
                                                        </td>
                                                        <td>
                                                                <input type="text" id="" value="<?php echo $fecha_vto; ?>" disabled class="inpGreen">
                                                        </td>

                                                        <td>
                                                                <input type="text" id="debe_first" value="<?php echo $array['debe']; ?>" disabled class="inpGreen">
                                                        </td>
                                                        <td>
                                                                 <input type="text" id="haber_first" value="<?php echo $array['haber']; ?>" disabled class="inpGreen">
                                                        </td>
                                                        <td>
                                                            <button id="minusRow" class="btn btn-danger" onclick="subtractrow(<?php echo $array['id_sw']; ?>)"><span class="glyphicon glyphicon-minus"></span></button>
                                                        </td>

                                                    </tr>
                                            <?php
                                    $contador = $contador + 1; 
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                                      
                        </tbody>

                        </table>
                        </div>
                </div>
                

             <!--</div>--> 
        <!-- class int         -->
        <table class="table tableCeleste">

                            
                            <tbody>
                                                    <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                                    <tr class="classGray">
                                                
                                                        <td class="colorTot">
                                                            <input class="colorTot" type="text" value="TOTALES $$" disabled size="13">
                                                        </td>
                                                        <td>
                                                             <input id="inpDebe" type="text" class="inpResultTotales" value="" disabled size="11">
                                                        </td>
                                                        <td>
                                                            <input id="inpHaber" type="text" class="inpResultTotales" value="" disabled size="11">
                                                        </td>
                                                        <td>
                                                            ........
                                                        </td>

                                                    </tr>
                                                
                                                        <!-- <div id="plusRow"></div> -->

                            </tbody>
        </table>
            
            <table class="table tableCeleste">

                            
                            <tbody>
                                                    <!-- ROW DE LA TABLA QUE NO SE DESPLIEGA -->
                                                    <tr class="classGray">
                                                        <td class="colorDif">
                                                            <input class="colorDif" type="text" value="DIFERENCIA $$" disabled size="13">
                                                        
                                                        </td>
                                                        <td>
                                                            <input id="totalDebe" type="text" class="inpResulDiferencia" value="" disabled size="11">
                                                        </td>
                                                        <td>
                                                            <input id="totalHaber" type="text" class="inpResulDiferencia" value="" disabled size="11">
                                                        </td>
                                                        <td>
                                                            ........
                                                        </td>

                                                    </tr>
                                                
                                                        <!-- <div id="plusRow"></div> -->

                            </tbody>
        </table>

        <br>

        <!--</div>-->
            <br>
    <!-- class ext         -->

    <!-- BOTONOES DE REGISTRAR Y LIMPIAR -->

    <!-- <div  class="container classext"> -->
                    <div class="form-inline">
                        <div class="form-group">  
                            <div class="input-group">
                                <button id="" class="btn btn-success btn-lg" onclick="saveSeat()">Cargar <span class="glyphicon glyphicon-ok"></span></button>
                            </div>

<!--                            <div class="input-group">
                                <button id="" class="btn btn-primary btn-lg" onclick="preguntarRegisterOk()" style="margin-left: 40px">Registrar <span class="glyphicon glyphicon-upload"></span></button>
                            </div>-->

                            <div class="input-group" id="adherir">
                                <button id="cancelReload" class="btn btn-danger btn-lg" onclick="pregutarSiNo()" style="margin-left: 1500px">Cancelar <span class="glyphicon glyphicon-repeat"></span></button>
                            </div>
                        </div>
                    </div>    

<br>
</div>
        </div>


    </div>
    <br><br>

</body>
</html>
    

<script type="text/javascript">
    $(document).ready(function () {

            $('#myUl li').click(function () { 
            typeSeat = $(this).data('id');
            $('#inputTypeSeat').val(typeSeat); 

            // }
            });
    });
</script>





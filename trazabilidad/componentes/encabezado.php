<?php

//session_start(); 
//
//    date_default_timezone_set('America/Argentina/Buenos_Aires');
//
//    $Today = date("Y-m-d");
//
//    $empresaName = $_SESSION['empresa.nombre'];
//    //---------------------------------------------------------------------------------------------------
//
//    $conn2 = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
//    $query = "SELECT * FROM puntos_ventas";
//    $stament = $conn2->prepare($query);
//    $stament->execute();
//
//    $res = $stament->fetch();
//
//    $pto_vta = $res['pto_vta'];
//    $descripcion = $res['descripcion'];
//
//    $conn2 = null; 


?>


        <div id="divBarril" class="form-group">  
            <div class="form-inline"> 
                    <div class="input-group col-xs-2">
                        <span id="spanBlack" class="input-group-addon">COD. BARRIL</span>
                            <input id="codigo_barril" type="text" class="form-control input-lg" size="37" onkeyup="functionDeployBarriles()">    
                    </div>
            </div> 
        </div>

        <div class="form-group">  
            <div class="form-inline">        
                    <div class="input-group col-xs-2">
                        <span id="spanBlack" class="input-group-addon">Nº CLIENTE</span>
                        <input id="num_cliente" type="text" class="form-control input-lg" onkeyup="functionDeployCustomer()">
                    </div>
        
                        <div class="input-group col-xs-3" style="margin-left: 10px">
                        <span id="spanBlack" class="input-group-addon">NOMBRE CLIENTE</span>
                        <input id="nombre_cliente" type="text" class="form-control input-lg" disabled>
                    </div>
            </div> 
        </div>
        
        <br><br><br>
        <div class="form-group" style="margin-left: 60px">  
            <div class="input-group">
                <button id="btnBuscaLote" disabled class="btn btn-success btn-lg active" onclick="buscarIdLote()">BUSCAR LOTE <span class="glyphicon glyphicon-ok"></span></button>
            </div>
        </div>
        <br><br><br><br>
                <!------------------------------------------------------------------------------------------------------>         
        <div class="input-group col-xs-3">
            <span id="spanBlack" class="input-group-addon">ID LOTE</span>
            <input id="lotes_id" type="text" class="form-control input-lg">
        </div>
        <br><br><br>
            <div class="form-group" style="margin-left: 60px">  
            <div class="input-group">
                <button id="btnTrazabilidad" class="btn btn-success btn-lg active" onclick="setSessionNumLote()">TRAZABILIDAD <span class="glyphicon glyphicon-ok"></span></button>
            </div>
        </div> 
                
        <div class="input-group col-xs-3 invisible" style="margin-left: 10px">
            <span id="spanBlack" class="input-group-addon">ID CLIENTE</span>
            <input id="clientes_id" type="text" class="form-control input-lg" disabled>
        </div>
        <div class="input-group col-xs-3 invisible" style="margin-left: 10px">
            <span id="spanBlack" class="input-group-addon">ID BARRIL</span>
            <input id="id_barril" type="text" class="form-control input-lg" size="44">
        </div>
     
<script type="text/javascript">
            $(document).ready(function(){
                $('#codigo_barril').focus();

            });
</script> 
                


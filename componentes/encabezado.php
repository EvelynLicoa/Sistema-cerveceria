<!DOCTYPE html>
<html lang="en">
<head>
<!--    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cronometro/css/font-awesome.min.css">
    <link href="cronometro/css/main.css" rel="stylesheet">-->


</head>
        <body>
            
            <!--------------------->
                        <div class="form-group" style="margin-left: 50px">  
                             <div class="form-inline"> 
                                      <div class="input-group col-xs-2">
                                            <span id="spanBlack" class="input-group-addon">CANTIDAD PRODUCIR /LTS.</span>
                                             <input id="cantidad" type="text" class="form-control input-lg" size="37">    
                                        </div>

                                     <div class="input-group col-xs-2" style="margin-left: 10px">
                                          <span id="spanBlack" class="input-group-addon">COCCIÓN</span>
                                         <input id="nombre_coccion" type="text" class="form-control input-lg" size="44" onkeyup="functionDeployCocciones()">
                                     </div>
                                      <div class="input-group col-xs-2 invisible">
                                            <span id="spanBlack" class="input-group-addon">ID</span>
                                             <input id="cocciones_id" type="text" class="form-control input-lg" size="37">    
                                        </div>

                                 
                              </div> 
                         </div> 
<br><br><br>
            
            
            <!--------------------->

            <div class="separator"></div>

            <div class="separator"></div>

            <div id="content">
                <div class="contador container">
                    <div id="inpHora" class="times row crono-width">

                    </div>
                    <div id="btn_ini_fin" class="row crono-width">

                    </div>
                </div>
            </div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#btn_ini_fin').load('cronometro/componentes/botonesMacerado.php');
                $('#inpHora').load('cronometro/componentes/hora.php');
                $('#cantidad').focus();
            });
        </script>
        </body>
</html>


  
       




<!--************-->


<!--   <div id="div_iniMacerado" class="container-fluid">
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-success btn-lg active" onclick="saveInicioMacerado()" style="margin-left: 50px">INICIO MASERADO <span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="div_FinMacerado" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-warning btn-lg active" onclick="saveFinMacerado()" style="margin-left: 50px">FIN MASERADO <span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="div_iniHervor" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-success btn-lg active" onclick="saveIniHervor()" style="margin-left: 50px">INICIO HERVOR<span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="div_finHervor" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-warning btn-lg active" onclick="saveFinHervor()" style="margin-left: 50px">FIN HERVOR<span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="div_iniFermentacion" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-success btn-lg active" onclick="saveIniFermentacion()" style="margin-left: 50px">INICIO FERMENTACIÓN<span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div id="div_finFermentacion" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-warning btn-lg active" onclick="saveFinFermentacion()" style="margin-left: 50px">FIN FERMENTACIÓN<span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

-------------------------------------------------------------------------------------------

                        <div id="div_iniFrio" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-success btn-lg active" onclick="saveIniFrio()" style="margin-left: 50px">INICIO DE FRIO<span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div id="div_finFrio" class="container-fluid" hidden>
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button class="btn btn-warning btn-lg active" onclick="saveFinFrio()" style="margin-left: 50px">FIN DE FRIO<span class="glyphicon glyphicon-ok"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
-------------------------------------------------------------------------------------------
                         <div id="divNum_comprobantes" class="container-fluid">
                            <br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">  
                                        <div class="input-group">
                                          <div class="input-daterange input-group" id="datepicker">   
                                            <button id="cancelReload" class="btn btn-danger btn-lg" onclick="pregutarSiNo()" style="margin-left: 50px">CANCELAR <span class="glyphicon glyphicon-repeat"></span></button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                               
                            
                       <br> 
                        -->
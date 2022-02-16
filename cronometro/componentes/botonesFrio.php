<?php

?>

    <button id="btnFrioIni" class="start-btn col-md-6 text-center btn-crono" onclick="saveIniFrio()">INICIO FRIO</button>
    <button id="btnFrioFin" class="stop-btn col-md-6 text-center btn-crono" onclick="pregutarPorFinFrio()">FIN FRIO</button>


 <script type="text/javascript">


$(document).ready(function(){
    $('#btnFrioIni').focus();
    $('#btnFrioFin').attr("disabled", true);

    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var 
    running_time = null;

    $("#btnFrioIni").click(function(){
        
            
            $('#btnFrioIni').attr("disabled", true);
            $('#btnFrioFin').attr("disabled", false);
            
            running_time = setInterval(function(){
                // Segundos
                tiempo.segundo++;
                if(tiempo.segundo >= 60)
                {
                    tiempo.segundo = 0;
                    tiempo.minuto++;
                }      

                // Minutos
                if(tiempo.minuto >= 60)
                {
                    tiempo.minuto = 0;
                    tiempo.hora++;
                }

                $("#hour").text(tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora);
                $("#minute").text(tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto);
                $("#second").text(tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo);
            }, 1000);
     
            });
            $('#btnFrioFin').click(function(){
                  clearInterval(running_time);
//                  $('#inpHora').load('cronometro/componentes/hora.php');

                  
                
//                $('#btn_ini_fin').load('cronometro/componentes/botonesFrio.php');
//                $('#inpHora').load('cronometro/componentes/hora.php');
//                $('#cantidad').val('');
//                $('#cantidad').attr("disabled", false);
//                $('#nombre_coccion').val('');
//                $('#nombre_coccion').attr("disabled", false);
           
                


            });
    });


</script>
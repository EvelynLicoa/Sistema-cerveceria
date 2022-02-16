<?php

?>
    <button id="btnHervorIni" class="start-btn col-md-6 text-center btn-crono" onclick="saveIniHervor()">INICIO HERVOR</button>
    <button id="btnHervorFin" class="stop-btn col-md-6 text-center btn-crono" onclick="pregutarPorFinHervor()">FIN HERVOR</button>



<script type="text/javascript">


$(document).ready(function(){
    $('#btnHervorIni').focus();
    $('#btnHervorFin').attr("disabled", true);

    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var 
    running_time = null;

    $("#btnHervorIni").click(function(){
        
            $('#btnHervorIni').attr("disabled", true);
            $('#btnHervorFin').attr("disabled", false);
                  
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
    $('#btnHervorFin').click(function(){
        clearInterval(running_time);
//        $('#btn_ini_fin').load('cronometro/componentes/botonesFermentacion.php');
//        $('#inpHora').load('cronometro/componentes/hora.php');
       
        
    });
});


     </script>
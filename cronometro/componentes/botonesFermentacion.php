<?php

?>

    <button id="btnFermentacionIni" class="start-btn col-md-6 text-center btn-crono" onclick="saveIniFermentacion()">INICIO FERMENTACIÓN</button>
    <button id="btnFermentacionFin" class="stop-btn col-md-6 text-center btn-crono" onclick="pregutarPorFinFermentacion()">FIN FERMENTACIÓN</button>
    



<script type="text/javascript">


$(document).ready(function(){
    $('#btnFermentacionIni').focus();
    $('#btnFermentacionFin').attr("disabled", true)
    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var 
    running_time = null;

    $("#btnFermentacionIni").click(function(){
        
            $('#btnFermentacionIni').attr("disabled", true);
            $('#btnFermentacionFin').attr("disabled", false)
            
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
    $('#btnFermentacionFin').click(function(){
        clearInterval(running_time);
//        $('#btn_ini_fin').load('cronometro/componentes/botonesFrio.php');
//        $('#inpHora').load('cronometro/componentes/hora.php');
       
        
    });
});


     </script>
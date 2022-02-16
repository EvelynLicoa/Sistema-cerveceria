<?php

?>


    <button id="btnMaceradoIni" class="start-btn col-md-6 text-center btn-crono" onclick="saveInicioMacerado()">INICIO MACERADO</button>
    <button id="btnMaceradoFin" class="stop-btn col-md-6 text-center btn-crono" onclick="pregutarPorFinMacerado()">FIN MACERADO</button>
    
    
   

<script type="text/javascript">


$(document).ready(function(){
    
    $('#btnMaceradoFin').attr("disabled", true);

    var tiempo = {
        hora: 0,
        minuto: 0,
        segundo: 0
    };

    var 
    running_time = null;

    $("#btnMaceradoIni").click(function(){

            $('#btnMaceradoIni').attr("disabled", true);
            $('#btnMaceradoFin').attr("disabled", false);

            
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
    $('#btnMaceradoFin').click(function(){
        clearInterval(running_time);
//        $('#btn_ini_fin').load('cronometro/componentes/botonesHervor.php');
//        $('#inpHora').load('cronometro/componentes/hora.php');
//
//        
    });
});


     </script>
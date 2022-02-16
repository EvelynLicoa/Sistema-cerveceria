<?php




?>


<!-- <ul id="numSeat" class="dropdown-menu"> -->
                    <!-- ACA TENGO QUE HACER UN FOREACH DE TODOS LOS NUMEROS DE ASIENTOS  -->


                    <?php
                    $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
                                            $query = "SELECT DISTINCT asientoborrador.num_asiento, asientoborrador.okcarga FROM asientoborrador WHERE asientoborrador.registrado = 0 GROUP BY asientoborrador.num_asiento";
                                            $stament = $conn->prepare($query);
                                            $stament->execute();


                                                //COMINEZO DEL FOR
                                            foreach ($stament as $array) {

                                            $okCarga = $array['okcarga']; 

                                                if($okCarga != 1){
                                                    $okey = '*';
                                                }else{
                                                    $okey = '✓';
                                                }
                                                
                                        
                    ?>

                    <li data-numdeasiento="<?php echo $array['num_asiento']; ?>"><a tabindex="-1"><?php echo 'ASIENTO Nº'.' '.$array['num_asiento'].' '.' '.$okey; ?></a></li>
                    <!-- <li><a tabindex="-1" href="#">2nd level dropdown</a></li> -->

                    <?php
                        }
                        //FIN DEL FOR
                        
                    ?>
                    
<!-- </ul> -->

<!-- --------------------- SI ELIJO UN ASIENTO DEL SELECT, ENTONCES PONGO EN SESSION ESE ASIENTO Y $.get( "componentes/retomartabla.php", --------------------------------------->
<script type="text/javascript">

$(document).ready(function () {

    $('#numSeat li').on('click', function(){


        $('.dropdown-submenu a.test').next('ul').toggle();

        // escribo el numero de asiento Y CARGA LA TABLA DE NUEVO 
        
        sendAsiento = $(this).data('numdeasiento');

        // alert(asiento);
        // return false; 

        setSeatSession(sendAsiento);

    });
    
});

</script>



      
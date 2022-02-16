
<?php


  
?>





<table class="table myhover table-condensed table-bordered" id="tablaDinamicaLoad">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>PUNTO VENTA</td>
                                <td>DESCRIPCIÓN</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');

                                    $query = "SELECT puntos_ventas.* FROM puntos_ventas";
                                    $stament = $conn->prepare($query);
                                    $stament->execute();

                                foreach ($stament as $array) {
     
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array['pto_vta']; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array['descripcion']; ?></td>   
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>



                    <script type="text/javascript">
             
                    $(function () {
                        $('#deployPuntoVentas').modal({
                            keyboard: true,
                            backdrop: "static",
                            show: false,

                            }).on('show', function () {

                            });

                        $("#deployPuntoVentas").find('#tabladinamica_puntoventas #trSelect td[data-id]').on('click', function () {
                        
                            code = 'code=' + $(this).data('id');// Este es el ID seleccionado de la tabla asientos desplegada 
                        
                            setCodePtoVentas(code)



                            // alert(code);
                            // return false; 
    
                        });


                        });


                  
     
         </script>
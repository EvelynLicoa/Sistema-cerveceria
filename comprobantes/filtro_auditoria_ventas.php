
<?php

?>


    <table class="table table-condensed table-bordered" id="tablaAuditoriaVentas">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>CLIENTE</td>
                                <td>COD. BARRIL</td>
                                <td>FECHA ENTREGA</td>
                                <td>MONTO TOTAL</td>
                                <td>TIPO PAGO</td>
                                <td>ENTREGADO</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                
                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
                                $query = "SELECT ventas.*, cliente.nombre, barriles.codigo FROM ventas 
                                INNER JOIN cliente ON ventas.cliente_id = cliente.id
                                INNER JOIN barriles ON ventas.barriles_id = barriles.id";
                                $stament = $conn->prepare($query);    
                                $stament->execute();

                                foreach ($stament as $array) {
     
                                    $entregado = $array['entregado'];
                                    
                                    if($entregado == 1){
                                       $MostrarEntegado = 'SI';
                                    }else{
                                       $MostrarEntegado = 'NO'; 
                                    }
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td id="thisCod" hidden><?php echo $array[0]; ?></td>
                                                    <td><?php echo utf8_encode($array['nombre']); ?></td>
                                                    <td><?php echo utf8_encode($array['codigo']); ?></td>
                                                    <td><?php echo utf8_encode($array['fecha_entrega']); ?></td>
                                                    <td><?php echo utf8_encode($array['monto_total']); ?></td>
                                                    <td><?php echo utf8_encode($array['tipo_pago']); ?></td>
                                                    <td><?php echo $MostrarEntegado; ?></td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>

                    </table>
 <script type= "text/javascript">
        $(document).ready(function(){
            $('#tablaAuditoriaVentas').DataTable({
            language:{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
                
                
                
            });

            
        });

           
//        
                
        </script>

               

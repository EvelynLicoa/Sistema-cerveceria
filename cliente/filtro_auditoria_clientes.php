
<?php

?>


    <table class="table table-condensed table-bordered" id="tablaAuditoriaClientes">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>NÚMERO</td>
                                <td>NOMBRE</td>
                                <td>DOMICILIO</td>
                                <td>CUIT</td>
                                <td>TIPO RESPONSABLE</td>
                                <td>PROVINCIAS</td>
                                <td>LOCALIDAD</td>
                                <td>COD. POSTAL</td>    
                                <td>ACCIÓN</td>
                                <td>FECHA</td>
                                <td>HORA</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                                
                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
                                $query = "SELECT auditoria_clientes.*,tipos_responsable.descripcion AS tipo_r, provincias.descripcion AS provincia FROM auditoria_clientes 
                                INNER JOIN tipos_responsable ON auditoria_clientes.tipos_responsable_id=tipos_responsable.id 
                                INNER JOIN provincias ON
                                auditoria_clientes.provincias_id=provincias.id";
                                $stament = $conn->prepare($query);    
                                $stament->execute();

                                foreach ($stament as $array) {
     
//                                    $estado = $array['estado'];
//                                    if($estado == 1){
//                                       $thisEstado = 'ACTIVO';
//                                    }else{
//                                       $thisEstado = 'INACTIVO'; 
//                                    }
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td id="thisCod" hidden><?php echo $array[0]; ?></td>
                                                    <td><?php echo utf8_encode($array['numero']); ?></td>
                                                    <td><?php echo utf8_encode($array['nombre']); ?></td>
                                                    <td><?php echo utf8_encode($array['domicilio']); ?></td>
                                                    <td><?php echo utf8_encode($array['cuit']); ?></td>
                                                    <td><?php echo utf8_encode($array['tipo_r']); ?></td>
                                                    <td><?php echo utf8_encode($array['provincia']); ?></td>
                                                    <td><?php echo utf8_encode($array['localidad']); ?></td>
                                                    <td><?php echo utf8_encode($array['cod_post']); ?></td>
                                                    <td><?php echo utf8_encode($array['accion']); ?></td>
                                                    <td><?php echo utf8_encode($array['fecha']); ?></td>
                                                    <td><?php echo utf8_encode($array['hora']); ?></td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>

                    </table>
 <script type= "text/javascript">
        $(document).ready(function(){
            $('#tablaAuditoriaClientes').DataTable({
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

               
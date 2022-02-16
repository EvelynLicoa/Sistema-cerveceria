
<?php

?>




<table class="table table-condensed table-bordered" id="tablaDinamicaLoad">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>NÚMERO</td>
                                <td>NOMBRE</td>
                                <td>CUIT</td>
                                <td></td>
<!--                                <td>DOMICILIO</td>
                                <td>TIPO RESPONSABLE</td>
                                <td>PROVINCIAS</td>
                                <td>LOCALIDAD</td>
                                <td>COD. POSTAL</td>
                                <td>CTA. CTE.</td>-->
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
                                
                                $query = "SELECT cliente.*,tipos_responsable.descripcion AS tipo_r, provincias.descripcion AS provincia FROM cliente
                                INNER JOIN tipos_responsable ON cliente.tipos_responsable_id=tipos_responsable.id 
                                INNER JOIN provincias ON
                                cliente.provincias_id=provincias.id WHERE cliente.estado = 0";
                                $stament = $conn->prepare($query);    
                                $stament->execute();

                                foreach ($stament as $array) {
     
                                    $estado = $array['estado'];
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[1]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[2]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[4]; ?></td>
                                                    <td>
                                                        <button class="btn btn-success" onclick="pregutarSiNoHabilitar('<?php echo $array[0]; ?>')"><span class="glyphicon glyphicon-ok"></span></button>
                                                    </td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>

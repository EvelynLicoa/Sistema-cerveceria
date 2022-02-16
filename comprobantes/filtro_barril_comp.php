
<?php

// include_once 'componentes/value.php';

session_start(); 

  
?>




    
        <table class="table table-condensed table-bordered" id="tablaBC">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>CÓDIGO BARRIL</td>
                                <td>CONTENIDO</td>
                                <td>CAPACIDAD</td>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');


//                                if (isset($_SESSION['value'])) {
//                                        $value = $_SESSION['value'];
//
//                                        $value =  $value.'%';
//                                        
////                                        echo Console::log($value);
//                                    //MAS ADELANTE LO HAGO CON UN LIKE ...PERO 
//                                    
//                                        $query = "SELECT * FROM stock WHERE codigo like :value ORDER BY codigo";
//                                        $stament = $conn->prepare($query);
//                                        $stament->bindParam(':value', $value);
//                               
//                                } else {
                                    $query = "SELECT DISTINCT barriles.*, envases.*, lotes.id, cocciones.nombre AS contenido, cocciones.precio_venta FROM barriles 
                                    INNER JOIN envases ON (barriles.id = envases.id_Barril) 
                                    INNER JOIN lotes ON (envases.id_Lote = lotes.id) 
                                    INNER JOIN cocciones ON (lotes.cocciones_id = cocciones.id) WHERE barriles.localizacion='Devuelto' and barriles.lleno=1 GROUP BY barriles.id ORDER BY envases.fecha DESC
                                    ";
                                    $stament = $conn->prepare($query);
//                                }
                             


                                $stament->execute();

                                

                                //COMINEZO DEL FOR
                                foreach ($stament as $array) {
                                    //No se porque el array $datos NO PUEDE SER ENVIADO EN EL PHP DE ARRIBA, DONDE "Agrego nuevo" 

//                                                $datos = $array[0] . "||" .
//                                                        $array[1] . "||" .
//                                                        $array[2] . "||" .
//                                                        $array[3] . "||" .
//                                                        $array[4] . "||" .
//                                                        $array[5] . "||" .
//                                                        $array[6] . "||" .
//                                                        $array[7];
//     
                                            ?>

                                            
                                                <!-- ROW DE LA TABLA QUE SE DESPLIEGA -->

                                                <!-- Si el tipo es 0, entonces desabilitar ese row -->
                                                <tr id="trBC">
                                                    <td data-id="<?php echo $array['id_Barril']; ?>" hidden><?php echo $array['id']; ?></td>
                                                    <td data-id="<?php echo $array['id_Barril']; ?>" width="22"><?php echo $array['codigo']; ?></td>  
                                                    <td data-id="<?php echo $array['id_Barril']; ?>"><?php echo $array['contenido']; ?></td>   
                                                    <td data-id="<?php echo $array['id_Barril']; ?>"><?php echo $array['capacidad']; ?></td> 
                                                </tr>
                                <?php }
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>

        <script type="text/javascript">
             
             $(document).ready(function(){
                        $('#deployBC').modal({
                            keyboard: true,
                            backdrop: "static",
                            show: false,

                            }).on('show', function () {

                            });
//                 ------------------------------------------------------------------------------------------

                    var start = document.getElementById('trBC');
                    start.focus();
                    start.style.backgroundColor = 'green';
                    start.style.color = 'white';
                    function dotheneedful(sibling) {
                        if (sibling != null) {
                            start.focus();
                            start.style.backgroundColor = '';
                            start.style.color = '';
                            start.setAttribute("isselect", "false");
                            sibling.focus();
                            sibling.style.backgroundColor = 'green';
                            sibling.style.color = 'white';
                            sibling.setAttribute("isselect", "true");
                            start = sibling;
                        }
                    }
                    document.onkeydown = checkKey;
                    function checkKey(e) {
                    e = e || window.event;
                    
                    if (e.keyCode == '13') {
                        dotheneedful(start);
                        var codeee = $("#tablaBC").find('tr[isselect="true"]').find('td:eq(0)').data('id');
                        setCodeBC(codeee);

                        $('#deployBC').modal('hide');
                        if ($('.modal-backdrop').is(':visible')) {
                          $('body').removeClass('modal-open'); 
                          $('.modal-backdrop').remove(); 
                        };

//                        focusCantidad('first');
                        console.log($("#tablaBC").find('tr[isselect="true"]'),codeee);
                    }
                    
                    if (e.keyCode == '37') {
                    //up arrow
                    var idx = start.cellIndex;
                    var nextrow = start.parentElement.previousElementSibling;
                    if (nextrow != null) {
                    var sibling = nextrow.cells[idx];
                    dotheneedful(sibling);
                    }
                    } else if (e.keyCode == '39') {
                    //down arrow
                    var idx = start.cellIndex;
                    var nextrow = start.parentElement.nextElementSibling;
                    if (nextrow != null) {
                    var sibling = nextrow.cells[idx];
                    dotheneedful(sibling);
                    }
                    } else if (e.keyCode == '38') { 
                    //HACIA ARRIBA
                    var sibling = start.previousElementSibling;
                    dotheneedful(sibling);
                    } else if (e.keyCode == '40') {
                    //HACIA ABAJO
                    var sibling = start.nextElementSibling;
                    dotheneedful(sibling);
                    }
        //             }else if (e.keyCode == '13') {
        //               console.log(ElementSibling);
        //               return false; 
        //             }
                    }
                             
            });
        </script> 

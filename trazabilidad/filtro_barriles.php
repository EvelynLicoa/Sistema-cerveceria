
<?php

?>




<table class="table table-condensed table-bordered" id="tablaDinamicaBarril">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>CODIGO</td>
                                <td>PROVEEDOR</td>
                                <td>CAPACIDAD/ Lts.</td>
                                <td>LOCALIZACIÓN</td>
                                <td>LLENO</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');

                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');
                                $query = "SELECT barriles.*, proveedores.nombre AS proveedor FROM barriles INNER JOIN proveedores 
                                WHERE barriles.proveedores_id = proveedores.Id"; 
                                $stament = $conn->prepare($query);    
                                $stament->execute();

                                foreach ($stament as $array) {
                                            $datos = $array[0] . "||" .
                                                        $array[1] . "||" .
                                                        $array[2] . "||" .
                                                        $array[3] . "||" .
                                                        $array[4] . "||" .
                                                        $array[5];
                                                if( $array[5] == 1){
                                                   $lleno = 'SI'; 
                                                }else{
                                                   $lleno = 'NO'; 
                                                }
     
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[1]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array['proveedor']; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[3]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[4]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $lleno; ?></td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>



                    <script type="text/javascript">
             
                    $(document).ready(function(){
                        $('#deployBarriles').modal({
                            keyboard: true,
                            backdrop: "static",
                            show: false,

                            }).on('show', function () {

                            });
//                      -----------------------------------------------

                        var start = document.getElementById('trSelect');
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
                            var codeee = 'code=' + $("#tablaDinamicaBarril").find('tr[isselect="true"]').find('td:eq(0)').data('id');
                            setCodeBarriles(codeee)

                            $('#deployBarriles').modal('hide');
                            if ($('.modal-backdrop').is(':visible')) {
                              $('body').removeClass('modal-open'); 
                              $('.modal-backdrop').remove(); 
                            };
                            
                            focusCliente();
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
         

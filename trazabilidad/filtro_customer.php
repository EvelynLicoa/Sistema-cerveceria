
<?php

?>




<table class="table table-condensed table-bordered" id="tablaDinamicaCustomer">
                        
                        <thead>
                            <tr>
                                <td hidden>ID</td>
                                <td>NUMERO</td>
                                <td>NOMBRE</td>
                                <td>DOCUMENTO</td>
                                <td>TELÉFONO</td>
                                <td>EMAIL</td>
                                <td>DIRECCIÓN</td>
                                <td>LOCALIDAD</td>
                                <td>COD. POSTAL</td>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php

            

                                $conn = new PDO('mysql:host=localhost; dbname=cerveceria', 'root', '');

                                $query = "SELECT * FROM cliente";
                                $stament = $conn->prepare($query);    
                                $stament->execute();

                                foreach ($stament as $array) {
     
                                            ?>

                                                <tr class="trColor" id="trSelect">
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[1]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[2]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[3]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[4]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[5]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[6]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[7]; ?></td>
                                                    <td data-id="<?php echo $array['id']; ?>"><?php echo $array[8]; ?></td>
                                                </tr>
                                            <?php
                                   }
                                   //FIN DEL FOR
                                    
                                ?>
                        </tbody>
                        
                        
                        
                  
                    </table>



                    <script type="text/javascript">
             
                    $(document).ready(function(){
                        $('#deployCustomer').modal({
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
                            var codeee = 'code=' + $("#tablaDinamicaCustomer").find('tr[isselect="true"]').find('td:eq(0)').data('id');
                            setCodeCustomer(codeee)

                            $('#deployCustomer').modal('hide');
                            if ($('.modal-backdrop').is(':visible')) {
                              $('body').removeClass('modal-open'); 
                              $('.modal-backdrop').remove(); 
                            };
                            focusBtnBuscaLote();
                            console.log($("#tablaCustomer").find('tr[isselect="true"]'),codeee);
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
         

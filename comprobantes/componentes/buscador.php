<?php 

session_start();

// if (isset($_POST['valor'])) {
   
//    $valor = $_POST['valor']; 
//    $_SESSION['consulta'] = $valor;
//    echo $valor;
//         //    echo "<script>
//         //        alert('$valor');
//         //        return false; 
//         //    </script>";
// }

$conn = new PDO('mysql:host=localhost; dbname=contable', 'root', '');
$stament = $conn->prepare('SELECT * FROM plandecuenta');
//$stament = $conn->prepare('SELECT id, codigo, numero, nombre, tipo FROM plandecuenta');
$stament->execute();
                         
                        //  foreach ($stament as $array) {

?>


           

<br><br>

<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
                
		<select id="busquedafiltro" class="form-control input-sm">
                    
			<option value="0">Seleciona uno</option>
			<?php 
                           foreach ($stament as $array):
                    
                        ?>

                        <option value="<?php echo $array[0]?>">
                            <?php echo $array[3]; ?>
                        </option>    

                        <?php endforeach; ?>

		</select>
	</div>
</div>

 


        
        
        
        
        <script type="text/javascript">
		$(document).ready(function(){
			$('#busquedafiltro').select2();

			
			$('#codigo').on('change', function(){   
				var valor = $('#busquedafiltro').val();
				
				$.ajax({
					type: "POST",
					url: '../componentes/crearsession.php',
					data: valor
				})
				.done(function(resultado){
					$('#tabla').load('../componentes/tabla.php'); 
				})
				.fail(function(resultado){
                                     alert('No se pudo!!!')
                        
                        
				})

			});
		});
	</script>


       
        
       

<!--	$('#codigo').on('change', function(){    
               var estecod = 'estecod=' + $('#codigo').val();
                
            //    alert(estecod);
                    $.ajax({
                        type: "POST",
                        url: "componentes/existecod.php",
                        data: estecod
                    })
                    .done(function(resultado){
                       $('#adherir').html(resultado)
                     })
                    .fail(function(resultado){
//                       alert('No existe!!!')
                        $('#adherir').html(resultado)
                        
                     })
                             
//                
            });  
        -->
        
        
        
        
        
        
        
        
        
        
        
        



	


    //*********************    ESTE INPUT ANDA !!!         ******************** */


//    function activeButton1(){
//        var campo = $('#nombre').val();
//
//
//        if ((campo !=null)&&(campo!='')){
//            activeButton2();
//        }else{
//            $("#btnguardar").prop("disabled", true);
//
//        }
//
//    }

    //*********************    ESTE SELECT ANDA !!!         ******************** */

//    function activeButton2(){
//
//        var incompletos = false; // AQUI inicializamos la variable
//
//        $('#tipo').find("option:selected").each(function() {
//          if ($(this).val().trim() == '') {
//            incompletos = true; // AQUI modificamos la variable
//            $("#btnguardar").prop("disabled", true);
//          }
//           else{
//            valor = $('#nombre').val();
//                if (valor != ''){
//                    $("#btnguardar").prop("disabled", false);
//                }
//          }
//        });
//        
//        if (incompletos) {// AQUI controlamos la variable
//          return;
//        }
//    }





//****************************************************************** */

    function agregardatos(cadena){
       
          $.ajax({
            type:"POST",
            url:"compras_ing_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_compras_ing').load('componentes/tabla_compras_ing.php'); 
//                    $('#buscador').load('../componentes/buscador.php'); 
                    alertify.success("Agregado con exito!");
                }else{
                    alertify.error("Hubo un fallo!");
                }
            }

        });

    }





    function actualizaDatos(){
        
        id = $('#idu').val();
        
        ingredientes_id = $('#ingredientes_idu').val();
        fecha_solicitud = $('#fecha_solicitudu').val();
        fecha_recibo = $('#fecha_recibou').val();
        cantidad = $('#cantidadu').val();
        monto = $('#montou').val();
        
      
        cadena= "id=" + id + 
                "&ingredientes_id=" + ingredientes_id +
                "&fecha_solicitud=" + fecha_solicitud +
                "&fecha_recibo=" + fecha_recibo +
                "&cantidad=" + cantidad +
                "&monto=" + monto;
        
        $.ajax({
        type:"POST",
        url:"compras_ing_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla_compras_ing').load('componentes/tabla_compras_ing.php'); 
                alertify.success("Actualizado con exito!");
            }else{
                alertify.error("Hubo un fallo!");

            }
        }

        });
    }
    
    
       function agregaformEdit(datos){

                d = datos.split('||');
               

                $('#idu').val(d[0]);
                $('#ingredientes_idu').val(d[1]);
                $('#fecha_solicitudu').val(d[2]);
                $('#fecha_recibou').val(d[3]);
                $('#cantidadu').val(d[4]);
                $('#montou').val(d[5]);
      

            }
            
            
     
           
         function agregaformNew(datos){

//                sendDatos = datos.split('||');
                $.ajax({
                        type: "POST",
                        url: "componentes/cliente_save.php",
                        data: datos,
                 })
                    .done(function(resultado){ //este resultado debe componer el nivel tambien 
                        alertify.success("Datos agregados correctamente!");
                 
                     })
                    .fail(function(resultado){
                       alert('Un problema!!!')

                     })
                             
//            
        }
                
      

    function pregutarSiNo (id) { 
        alertify.confirm('Eliminar registro', '¿Está seguro que quiere eliminar?', 

        function () { 
            eliminarRegistro(id) }, 

        function(){ 
            alertify.error('Se cancelo')
        });

    }
        
      
    function eliminarRegistro(id){
  
        esteid = "id=" + id;

        $.ajax({
            type: "POST",
            url: "compras_ing_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_compras_ing').load('componentes/tabla_compras_ing.php');
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
    


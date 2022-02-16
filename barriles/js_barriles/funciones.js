

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
            url:"barril_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_barril').load('componentes/tabla_barril.php'); 
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
        
        codigo = $('#codigou').val();
        proveedores_id = $('#proveedores_idu').val();
        capacidad = $('#capacidadu').val();
        localizacion = $('#localizacionu').val();
        lleno = $('#llenou').val();
       

        cadena= "id=" + id + 
                "&codigo=" + codigo +
                "&proveedores_id=" + proveedores_id +
                "&capacidad=" + capacidad +
                "&localizacion=" + localizacion + 
                "&lleno=" + lleno;
                
                

        
        
        $.ajax({
        type:"POST",
        url:"barril_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla_barril').load('componentes/tabla_barril.php'); 
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
                $('#codigou').val(d[1]);
                $('#proveedores_idu').val(d[2]);
                $('#capacidadu').val(d[3]);
                $('#localizacionu').val(d[4]);
                $('#llenou').val(d[5]);
  

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
            url: "barril_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_barril').load('componentes/tabla_barril.php'); 
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
    


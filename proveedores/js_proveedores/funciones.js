

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
            url:"proveedor_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_prov').load('componentes/tabla_proveedores.php'); 
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
        
        nombre = $('#nombreu').val();
        documento = $('#documentou').val();
        telefono = $('#telefonou').val();
        email = $('#emailu').val();
        direccion = $('#direccionu').val();
        localidad = $('#localidadu').val();
        codPostal = $('#codPostalu').val();
        
      
        cadena= "id=" + id + 
                "&nombre=" + nombre +
                "&documento=" + documento +
                "&telefono=" + telefono +
                "&email=" + email +
                "&direccion=" + direccion +
                "&localidad=" + localidad +
                "&codPostal=" + codPostal;

        $.ajax({
        type:"POST",
        url:"proveedor_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla_prov').load('componentes/tabla_proveedores.php'); 
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
                $('#nombreu').val(d[1]);
                $('#documentou').val(d[2]);
                $('#telefonou').val(d[3]);
                $('#emailu').val(d[4]);
                $('#direccionu').val(d[5]);
                $('#localidadu').val(d[6]);
                $('#codPostalu').val(d[7]);

            }
            
            
            
           
         function agregaformNew(datos){

//                sendDatos = datos.split('||');
                $.ajax({
                        type: "POST",
                        url: "componentes/proveedor_save.php",
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
            url: "proveedor_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_prov').load('componentes/tabla_proveedores.php'); 
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
    


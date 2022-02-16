

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
            url:"insumo_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_insumos').load('componentes/tabla_insumos.php'); 
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
        proveedores_id = $('#proveedores_idu').val();
        descripcion = $('#descripcionu').val();
        stock_min = $('#stock_minu').val();
        stock_actual = $('#stock_actualu').val();
        costo = $('#costou').val();
        cantidad = $('#cantidadu').val();
        recordatorio = $('#recordatoriou').val();
        


        cadena="id=" + id +
              "&nombre=" + nombre +
              "&proveedores_id=" + proveedores_id +
              "&descripcion=" + descripcion +
              "&stock_min=" + stock_min +
              "&stock_actual=" + stock_actual +
              "&costo=" + costo +
              "&cantidad=" + cantidad +
              "&recordatorio=" + recordatorio;

              

        $.ajax({
        type:"POST",
        url:"insumo_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                 $('#tabla_insumos').load('componentes/tabla_insumos.php'); 
                alertify.success("Actualizado con exito!");
            }else{
                alertify.error("Hubo un fallo de insumos!");

            }
        }

        });
    }
    
    
        function agregaformEdit(datos){

         d = datos.split('||');

         $('#idu').val(d[0]);
         $('#nombreu').val(d[1]);
         $('#proveedores_idu').val(d[2]);
         $('#descripcionu').val(d[3]);
         $('#stock_minu').val(d[4]);
         $('#stock_actualu').val(d[5]);
         $('#costou').val(d[6]);
         $('#cantidadu').val(d[7]);
         $('#recordatoriou').val(d[8]);

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
            url: "insumo_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_insumos').load('componentes/tabla_insumos.php');  
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
    


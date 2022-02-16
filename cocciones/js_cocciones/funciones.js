

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
            url:"coccion_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_cocciones').load('componentes/tabla_cocciones.php'); 
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
        tipo_receta = $('#tipo_recetau').val();
        tipo_cerveza = $('#tipo_cervezau').val();
        color = $('#coloru').val();
        amargor = $('#amargoru').val();
        densidad = $('#densidadu').val();
        tiempo_macerado = $('#tiempo_maceradou').val();
        tiempo_hervor = $('#tiempo_hervoru').val();
        tiempo_ferm = $('#tiempo_fermu').val();
        tiempo_enfr = $('#tiempo_enfru').val();
        favorito = $('#favoritou').val();
        precio_venta = $('#precio_ventau').val();
        descuento = $('#descuentou').val();
        stock_min = $('#stock_minu').val();
        stock_actual = $('#stock_actualu').val();
        
//        ----

        cadena="id=" + id +
              "&nombre=" + nombre +
              "&tipo_receta=" + tipo_receta +
              "&tipo_cerveza=" + tipo_cerveza +
              "&color=" + color +
              "&amargor=" + amargor +
              "&densidad=" + densidad +
              "&tiempo_macerado=" + tiempo_macerado +
              "&tiempo_hervor=" + tiempo_hervor +
              "&tiempo_ferm=" + tiempo_ferm +
              "&tiempo_enfr=" + tiempo_enfr +
              "&favorito=" + favorito +
              "&precio_venta=" + precio_venta +
              "&descuento=" + descuento +
              "&stock_min=" + stock_min +
              "&stock_actual=" + stock_actual;
      
        $.ajax({
        type:"POST",
        url:"coccion_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                 $('#tabla_cocciones').load('componentes/tabla_cocciones.php'); 
                alertify.success("Actualizado con exito!");
            }else{
                alertify.error("Hubo un fallo en cocciones!");

            }
        }

        });
    }
    
    
        function agregaformEdit(datos){
            
     
         d = datos.split('||');

         $('#idu').val(d[0]);
         $('#nombreu').val(d[1]);
         $('#tipo_recetau').val(d[2]);
         $('#tipo_cervezau').val(d[3]);
         $('#coloru').val(d[4]);
         $('#amargoru').val(d[5]);
         $('#densidadu').val(d[6]);
         $('#tiempo_maceradou').val(d[7]);
         $('#tiempo_hervoru').val(d[8]);
         $('#tiempo_fermu').val(d[9]);
         $('#tiempo_enfru').val(d[10]);
         $('#favoritou').val(d[11]);
         $('#precio_ventau').val(d[12]);
         $('#descuentou').val(d[13]);
         $('#stock_minu').val(d[14]);
         $('#stock_actualu').val(d[15]);
       

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
            url: "coccion_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_cocciones').load('componentes/tabla_cocciones.php'); 
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
    


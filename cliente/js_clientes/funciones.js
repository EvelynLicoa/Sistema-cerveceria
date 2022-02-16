

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




//*******************************************************************************************************************
//        function setMascaraCuit(){
//              
//                $('#cuit').on({
//                    "focus": function (event) {
//                        $(event.target).select();
//                    },
//                    "keyup": function (event) {
//                        $(event.target).val(function (index, value ) {
//                            return value.replace(/\D/g, "")
//                                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
//                                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
//                        });
//                    }
//                });
//
//            }

//********************************************************************************************************************

function functionDeployCustomerAuditory(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
            

                            $.get( "filtro_clientes.php", function( dataHTML ) {
                                $( "#tabladinamica_clientes" ).html( dataHTML );
                                $('#deployClientes').modal('show');
                              });

}

//***********************************************************************************************************************

function functionDeployAuditoriaCustomer(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
            

                            $.get( "filtro_auditoria_clientes.php", function( dataHTML ) {
                                $( "#tabladinamica_auditoria_clientes" ).html( dataHTML );
                                $('#deployAuditoriaClientes').modal('show');
                              });

}

//***********************************************************************************************************************






    function agregardatos(cadena){
        
        boolean = validarCuit(cuit);

        if(boolean == false){
            alertify.error('ERROR!', 'Verificar CUIT!');
            return false; 
        }
//        alert(cadena);
//        return false;

          $.ajax({
            type:"POST",
            url:"cliente_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_customer').load('componentes/tabla_clientes.php'); 
//                    $('#buscador').load('../componentes/buscador.php'); 
                    alertify.success("Agregado con exito!");
                }else{
                    alertify.error("Hubo un fallo!");
                }
            }

        });

    }



    //****************************************************************** */

                function validarCuit(cuit) {

                    if(cuit.length != 13) {
                            return false;
                    }
                    
                    esteCuit = cuit.replace(/-/g, "");


                    var acumulado = 0;
                    var digitos = esteCuit.split("");
                    var digito = digitos.pop();

                    for(var i = 0; i < digitos.length; i++) {
                            acumulado += digitos[9 - i] * (2 + (i % 6));
                    }

                    var verif = 11 - (acumulado % 11);
                    if(verif == 11) {
                            verif = 0;
                    }

                    return digito == verif;
//                      alert(digito == verif);
//                      return false; 

                }

//********************************************************************



    function actualizaDatos(){
        
 
        id = $('#idu').val();
        
        numero = $('#numerou').val();
        nombre = $('#nombreu').val();
        domicilio = $('#domiciliou').val();
        cuit = $('#cuitu').val();
        tipos_responsable_id = $('#tipos_responsable_idu').val();  
        provincias_id = $('#provincias_idu').val();
        localidad = $('#localidadu').val();
        cod_post = $('#cod_postu').val();      
        cta_cte = $('#cta_cteu').val();
        
        
        cadena= "id=" + id + 
                "&numero=" + numero +
                "&nombre=" + nombre +
                "&domicilio=" + domicilio +
                "&cuit=" + cuit +
                "&tipos_responsable_id=" + tipos_responsable_id +
                "&provincias_id=" + provincias_id +
                "&localidad=" + localidad +
                "&cod_post=" + cod_post +
                "&cta_cte=" + cta_cte;
        
//      *********************************************************************************
        boolean = validarCuit(cuit);

        if(boolean == false){
            alertify.alert('ERROR!', 'Verificar CUIT!');
            return false; 
        }
        
//      *************************************************************
        
        $.ajax({
        type:"POST",
        url:"cliente_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla_customer').load('componentes/tabla_clientes.php'); 
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
                $('#numerou').val(d[1]);
                $('#nombreu').val(d[2]);
                $('#domiciliou').val(d[3]);
                $('#cuitu').val(d[4]);;
                $('#tipos_responsable_idu').val(d[5]);  
                $('#provincias_idu').val(d[6]);;
                $('#localidadu').val(d[7]);
                $('#cod_postu').val(d[8]);      
                $('#cta_cteu').val(d[9]);

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
                
      

    function pregutarSiNoDeshabilitar (id) { 
        alertify.confirm('Inhabilitar clientes', '¿Está seguro que quiere inhabilitar?', 

        function () { 
            DesabilitarRegistro(id) }, 

        function(){ 
            alertify.error('Se cancelo')
        });

    }
        
      
    function DesabilitarRegistro(id){
  
        esteid = "id=" + id;

        $.ajax({
            type: "POST",
            url: "cliente_disable.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_customer').load('componentes/tabla_clientes.php'); 
                    alertify.success("EL REGISTRO HA SIDO DESHABILITADO!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
//    ***************************************************************************************************************

 function pregutarSiNoHabilitar (id) { 
        alertify.confirm('Habilitar clientes', '¿Está seguro que quiere habilitar registro?', 
        
        function () { 
            HabilitarRegistro(id) }, 

        function(){ 
            alertify.error('Se cancelo')
        });

    }
        
      
    function HabilitarRegistro(id){
  
        esteid = "id=" + id;

        $.ajax({
            type: "POST",
            url: "cliente_enabled.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    
                    alertify.success("EL REGISTRO HA SIDO HABILITADO!");
//                    $('#formModalCustomer')[0].reset();
                    $('#deployClientes').modal('hide');
                    $('#tabla_customer').load('componentes/tabla_clientes.php'); 
                    
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
//    ----------------------------------------------------------------------------------

    function functionValidarNumero(){
        numero = 'numero=' + $('#numero').val();    
          $.ajax({
            type: "POST",
            url: "componentes/validarNumCliente.php",
            data: numero,
           })
            .done(function(resultado){ //este resultado debe componer el nivel tambien 
                cantidad = JSON.parse(resultado);
//                alert(cantidad);
//                return false;
                        
                 if(cantidad == 0){
                    $('#adherirOkeyNum').html("<span id='span' class='fas fa-check'></span>")    
                }else{
                    $('#adherirOkeyNum').html("<span id='span' class='fas fa-times input-group'></span>")
                }
//                alertify.success("Datos agregados correctamente!");

             })
            .fail(function(resultado){
               alert('Un problema!!!')

             })
    
    }
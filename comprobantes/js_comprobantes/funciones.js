

var quienhizoenter =''; //ESTA VARIABLE ES GLOBAL, Y ES LA GENEREADA CON ---> new Date().getUTCMilliseconds();

//quienhizoenter hace referencia a quien selecciono una row de la table deploy 
//lo cual esta perfecto PORQUE NADIE VA A ELIMINAR UNA FILA QUE NO COMPLETO



///////////////////// ELIMINAR SOBRE TABLA RETOMAR //////////////////////////////////////////////////////////////////////
//********************************************************************************************************************** */
    function subtractrow(i){    

    verificarCod = $('#deploy_'+i).val();
    
    row = $('#row_'+i).val();


    if(verificarCod != ''){
    
        id_sw = 'id_sw=' + i;


        $.ajax({
            type:"GET",
            url:"renglon_comp/renglon_destroy.php",
            data:id_sw,
        })
        .done(function(resultado){

            $('#row_'+i).remove();

            alertify.success("Se elimino con exito!");
            setInputTotal();

         })
         .fail(function(resultado){
            alertify.error("Hubo un fallo!");

        })
 
      }
    }





    ///////////////////// ELIMINAR SOBRE TABLA RETOMAR //////////////////////////////////////////////////////////////////////
    function subtractrowFirst(){    

     verificarCod = $('#deploy_first').val();

    if(verificarCod != ''){

        id_sw = 'id_sw=' + 1;

        $.ajax({
            type:"GET",
            url:"renglon_comp/renglon_destroy.php",
            data:id_sw,
        })
        .done(function(resultado){

            $('#row_first').remove();

            alertify.success("Se elimino con exito!");
            setInputTotal();

          
         })
         .fail(function(resultado){
            alertify.error("Hubo un fallo!");

        })

    }

    }
    // /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////


        // ///////////////   LUEGO AHORRAR CODIGO        ///////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    function disableHaberUno(){  

 
        // $('#haber_uno').prop('disabled', 'disabled');
        valor = $('#haber_uno').val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#haber_uno').prop('readonly', 'readonly');
                $('#haber_uno').addClass("inpColDisabled");
                $('#debe_uno').removeClass("inpColDisabled");
                $('#debe_uno').prop('readonly', false);
            }


         $('#debe_uno').on({
          "focus": function (event) {
              $(event.target).select();
          },
          "keyup": function (event) {
              $(event.target).val(function (index, value ) {
                  return value.replace(/\D/g, "")
                              .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                              .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
              });
          }
      });

        
  }


  function disableDebeUno(){  

 
    // $('#debe_uno').prop('disabled', 'disabled');

    valor = $('#debe_uno').val();


    if (valor == ''){    
        //al haber le doy el aspecto de color 
        $('#debe_uno').prop('readonly', 'readonly');
        $('#debe_uno').addClass("inpColDisabled");
        $('#haber_uno').removeClass("inpColDisabled");
        $('#haber_uno').prop('readonly', false);
    }




     $('#haber_uno').on({
      "focus": function (event) {
          $(event.target).select();
      },
      "keyup": function (event) {
          $(event.target).val(function (index, value ) {
              return value.replace(/\D/g, "")
                          .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
          });
      }
  });

    
}

    // /////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////




    function disableFirstHaber(){  

 
        //   $('#haber_first').prop('disabled', 'disabled');
            valor = $('#haber_first').val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#haber_first').prop('readonly', 'readonly');
                $('#haber_first').addClass("inpColDisabled");
                $('#debe_first').removeClass("inpColDisabled");
                $('#debe_first').prop('readonly', false);
            }


      
     

           $('#debe_first').on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });

          
    }



    function disableHaber(i){
        // $('#haber_'+i).prop('disabled', 'disabled');
        valor = $('#haber_'+i).val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#haber_'+i).prop('readonly', 'readonly');
                $('#haber_'+i).addClass("inpColDisabled");
                $('#debe_'+i).removeClass("inpColDisabled");
                $('#debe_'+i).prop('readonly', false);
            }


        $('#debe_'+i).on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
        
    }

    //****************************************************************************************************************** */


    function disableFirstDebe(){
        // $('#debe_first').prop('disabled', 'disabled');
        valor = $('#debe_first').val();

        // alert(valor);

        if (valor == ''){
            //al haber le doy el aspecto de color 
            $('#debe_first').prop('readonly', 'readonly');
            $('#debe_first').addClass("inpColDisabled");
            $('#haber_first').removeClass("inpColDisabled");
            $('#haber_first').prop('readonly', false);

        }

        $('#haber_first').on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
        
    }


    function disableDebe(i){
        // $('#debe_'+i).prop('disabled', 'disabled');

        valor = $('#debe_'+i).val();


            if (valor == ''){    
                //al haber le doy el aspecto de color 
                $('#debe_'+i).prop('readonly', 'readonly');
                $('#debe_'+i).addClass("inpColDisabled");
                $('#haber_'+i).removeClass("inpColDisabled");
                $('#haber_'+i).prop('readonly', false);
            }


        $('#haber_'+i).on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                                .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
                });
            }
        });
        
        
    }


//************          TOTALES            ************************** */


function setSeatSession(seat){ 
        
    asiento= 'asiento=' + seat; 

    // alert(asiento);
    // return false; 

    $.ajax({
        type: "GET",
        url: "componentes/asientoborrador.php",
        data: asiento
        })
        .done(function(resultado){
            //1- Primero cambio el tipo de dato del input de feccha, DE DATE A TEXT
            $('#fechaContableNew').attr('type', 'text');
            //2-Le doy disabled a ese input
//            $('#fechaContableNew').prop('disabled', 'disabled');
            //3- Recien ahi retomo la tabla "retomarTabla" 
            $.get( "componentes/retomartabla.php", function( dataHTML ) {
                $('#tabla').empty().html(dataHTML);
     
                        setInputDebeTotal();
                        setInputHaberTotal();
                        setInputDebeDif();
                        setInputHaberDif();

                        $('#inputSeat').val(seat); 
              });

    })
    .fail(function(resultado){
        console.log('No existe!!!')

    })



}


//ACA ESTA EL PROBLEMA  


    function setCodeBC(cod){
        code = 'code=' + cod; 
        $.ajax({
            type: "POST",
            url: "componentes/datos.php",
            data: code
            })
            .done(function(resultado){
                       
                barril = JSON.parse(resultado);
                
                
                id = (barril[0].id);
                codigo = (barril[0].codigo);
                coccion = (barril[0].contenido);
                precio_venta = (barril[0].precio_venta);
                capacidad = (barril[0].capacidad);
                
                
               
                $.get( "filtro_barril_comp.php", function() {
                        $('#idBarril_'+quienhizoenter).val(cod);//id de barril
                        
                        $('#id_'+quienhizoenter).val(id); //id de lote
                        $('#deploy_'+quienhizoenter).val(codigo);
                        $('#descripcion_'+quienhizoenter).val(coccion);    
                        $('#precioUnit_'+quienhizoenter).val('$ '+precio_venta); 
                        $('#cantidad_'+quienhizoenter).val(capacidad); 
                            
                        $('#deploy_'+quienhizoenter).prop('disabled', true);
                        $('#deploy_'+quienhizoenter).addClass("inpWhite");

                  })
//                  focusCantidad(quienhizoenter);
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            })

    }


    // //////////////////////////////////////////////////////////////////////
    
    
        function setCodePtoVentas(code){
 
        $.ajax({
            type: "POST",
            url: "componentes/datosPuntoVenta.php",
            data: code
            })
            .done(function(resultado){
                
                puntosV = JSON.parse(resultado);

                id = (puntosV[0].id);
                pto_vta = (puntosV[0].pto_vta);
                descripcion = (puntosV[0].descripcion);

                $.get( "filtro_puntoventas.php", function() {

                        $('#punto_venta').val(pto_vta);
                        $('#nombre_punto_venta').val(descripcion);

//                        $('#punto_venta').prop('disabled', true);
//                        $('#deploy_'+quienhizoenter).addClass("inpWhite");

                  });
                
                
                // $('#nombreDeCuenta').val() = (cuenta[0].nombre);
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            })
    
 
    }
    
//******************************************************************************

    
    function setCodeClientes(code){
     
        $.ajax({
            type: "POST",
            url: "componentes/datosClientes.php",
            data: code
            })
            .done(function(resultado){
         
                clientes = JSON.parse(resultado);
        

                id = (clientes[0].id);
                numero = (clientes[0].numero);
                nombre = (clientes[0].nombre);
                tipo_r = (clientes[0].tipo_r);
                cuit = (clientes[0].cuit);
                provincia = (clientes[0].provincia);
                
                     

                $.get( "filtro_clientes.php", function() {
                        $('#num_cliente').val(numero);
                        $('#nombre_cliente').val(nombre);
                        $('#clientes_id').val(id);
                        $('#tipor_cliente').val(tipo_r);
                        $('#cuit_cliente').val(cuit);
                        $('#prov_cliente').val(provincia);

                  });
                      
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            }) 
    }
    
    
    
//******************************************************************************

   function setCodeProvincias(code){

        $.ajax({
            type: "POST",
            url: "componentes/datosProvincias.php",
            data: code
            })
            .done(function(resultado){
                
                provincias = JSON.parse(resultado);
        
                id = (provincias[0].id);
                descripcion = (provincias[0].descripcion);
                
//                alert(descripcion);
//                return false; 
              
                $.get( "filtro_provincias.php", function() {
                        $('#prov_cliente').val(descripcion);

                  });
                
                
                // $('#nombreDeCuenta').val() = (cuenta[0].nombre);
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            })
    
 
    }



//******************************************************************************

   function setCodeFormaPago(code){

        $.ajax({
            type: "POST",
            url: "componentes/datosFormaPago.php",
            data: code
            })
            .done(function(resultado){
                
                forma_pago = JSON.parse(resultado);
        
                id = (forma_pago[0].id);
                descripcion = (forma_pago[0].descripcion);
                
//                alert(descripcion);
//                return false; 
              
                $.get( "filtro_forma_pago.php", function() {
                        $('#forma_pago').val(descripcion);
                        $('#id_forma_pago').val(id);

                  });
                
                
                // $('#nombreDeCuenta').val() = (cuenta[0].nombre);
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            })
    
 
    }

//******************************************************************************
    
       function setCodeTComprobantes(code){

        $.ajax({
            type: "POST",
            url: "componentes/datosTComprobantes.php",
            data: code
            })
            .done(function(resultado){
                
                tcomprobante = JSON.parse(resultado);
        
                id = (tcomprobante[0].id);
                descripcion = (tcomprobante[0].descripcion);
                abreviacion = (tcomprobante[0].abreviacion);
                
//                alert(descripcion);
//                return false; 
              
                $.get( "filtro_tcomprobantes.php", function() {
                        $('#tipo_comprobante').val(abreviacion);
                        $('#id_comprobante').val(id);
                  });

             })
             .fail(function(resultado){
                console.log('No existe!!!')

            })
  
    }


//******************************************************************************
    
       function setCodeTComprobantesDos(code){
//                alert(code);
//                return false; 
            $.ajax({
                    type: "POST",
                    url: "../componentes/datosTComprobantesDos.php",
                    data: code
                    })
                    .done(function(resultado){     
                        
//                         alert('OKEY');
//                         return false; 
                        
                        tcomprobante = JSON.parse(resultado);
                     
                        id = (tcomprobante[0].id);
                        abreviacion = (tcomprobante[0].abreviacion);
                        
                        $('#tipo_comprobante_dos').val(abreviacion);
                        $('#id_dos').val(id);
                        
                        tipo_comprobante_dos = $('#tipo_comprobante_dos').val();
    
                        $('#divBtnFiltrar').prop('hidden', false);
                        $('#btnFiltrar').focus();

                     })
                     .fail(function(resultado){
                        console.log('No existeeeeeeeeeeeeeeeeeeeeeeeeeeeee!!!')

                    })
  
    }
//******************************************************************************
    


    //Cuando agrego la fila con el agregaformNew() le doy por parametro del input nuevo este i que esta en esta funcion
    // para que ese valor este en session y busca 

    
    function functionDeployBC(i){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
        
        if (event.keyCode == 13) {

                         value= 'value=' + $('#deploy_'+i).val();


                        //  alert(value);
                        //  return false; 

                         quienhizoenter = i;
           
                         $.ajax({
                             type: "POST",
                             url: "componentes/value.php",
                             data: value
                        })
                         .done(function(resultado){

                            //Llamo a PHP para que me dibuje la nueva tabla en el div "tabladinamica"
                            //console.log("LLAMARA A TABLE!!");
                            $.get( "filtro_barril_comp.php", function( dataHTML ) {
                                $( "#tabladinamica" ).html( dataHTML );
                                $('#deployBC').modal('show');
                              });
                              
                          

                         })
                         .fail(function(resultado){
                             console.log('No existe!!!')

                         })

                    }           
    }


//****************************************************************************************************************** */
//****************************************************************************************************************** */


function functionDeployPtoVta(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
        
        if (event.keyCode == 13) {

                            //Llamo a PHP para que me dibuje la nueva tabla en el div "tabladinamica"
                            //console.log("LLAMARA A TABLE!!");
                            $.get( "filtro_puntoventas.php", function( dataHTML ) {
                                $( "#tabladinamica_puntoventas" ).html( dataHTML );
                                $('#deployPuntoVentas').modal('show');
                              });


                    
    }
}

//*******************************************************************************************************************
//****************************************************************************************************************** */


function functionDeployClientes(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
    
//        $('#tipo_comprobante').val('');
        
        
        if (event.keyCode == 13) {
//            alert('HOLA');
//            return false; 
                $.get( "filtro_clientes.php", function( dataHTML ) {
                    $( "#tabladinamica_clientes" ).html( dataHTML );
                    $('#deployClientes').modal('show');
                  });
                        
    }
}

//*******************************************************************************************************************

function functionDeployProvincias(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
        
        if (event.keyCode == 13) {

                            //Llamo a PHP para que me dibuje la nueva tabla en el div "tabladinamica"
                            //console.log("LLAMARA A TABLE!!");
                            $.get( "filtro_provincias.php", function( dataHTML ) {
                                $( "#tabladinamica_provincias" ).html( dataHTML );
                                $('#deployProvincias').modal('show');
                              });


                    
    }
}




//*******************************************************************************************************************

function functionDeployTipoComp(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
            
    tipo_r = 'tipo_r=' + $('#tipor_cliente').val();
    
          $.ajax({
            type:"POST",
            url: "componentes/setTipoResponsable.php",
            data:tipo_r,
            })
            .done(function(resultado){
               fecha_contable = resultado;   
            })
            .fail(function(resultado){
                
            })

        if (event.keyCode == 13) {
 
                            $.get( "filtro_tcomprobantes.php", function( dataHTML ) {
                                $( "#tabladinamica_tcomprobantes" ).html( dataHTML );
                                $('#deployTComprobantes').modal('show');
                              });
        
    }
     
}

//----------------------------------------------------------------------------------------------------

function functionDeployTipoCompDos(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
            
    if (event.keyCode == 13) {
 
        $.get( "../filtro_tcomprobantes_dos.php", function( dataHTML ) {
            $( "#tabladinamica_tcomprobantes_dos" ).html( dataHTML );
            $('#deployTComprobantesDos').modal('show');
          });
        
    }
    

}



//*******************************************************************************************************************

function functionDeployFormaPago(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
   
        if (event.keyCode == 13) {
 
                            $.get( "filtro_forma_pago.php", function( dataHTML ) {
                                $( "#tabladinamica_forma_pago" ).html( dataHTML );
                                $('#deployFormaPago').modal('show');
                              });
          
    }
}
//--------------------------------------------------------------------------------------------------------------------------

     function FirstRowNewBarrilesComp(){

     verificoCod = $('#deploy_first').val();
     num_cliente = $('#num_cliente').val();
     tipo_comprobante = $('#tipo_comprobante').val();
     forma_pago = $('#forma_pago').val();


    if((verificoCod == "")||(num_cliente == "") ||(tipo_comprobante == "") ||(forma_pago == "")){

        alertify.warning('Datos incompletos...');
       

    } else{
        
      $('#plusRow_first').prop('disabled', 'disabled');
      $('#plusRow_first').removeClass('btn-info');
      $('#plusRow_first').removeClass('active');
      $('#plusRow_first').addClass('btn-secondary');
        
      $('#deploy_first').prop('disabled', 'disabled');


            cliente_id = $('#clientes_id').val();//codigo del cliente

            lotes_id = $('#id_first').val();//codigo del lote
             
            barriles_id = $('#idBarril_first').val();//id de barril
            
            fecha_entrega = $('#fecha_contable').val();
            
            fecha_devolucion = $('#fecha_contable').val();
            
            precio_neto = $('#precioUnit_first').val().substring(2,15);
            
            cantidad = $('#cantidad_first').val();
            
            monto_total = precio_neto*cantidad; 
            
            monto_pagado = precio_neto*cantidad; 
            
            tipo_pago = $('#forma_pago').val();
            
            entregado = 1; 
                        
            $('#subtotales_first').val('$ '+monto_pagado);                

//               *************************************************************

             cadena= "cliente_id=" + cliente_id +
                     "&id_sw= " + 1 +
                     "&lotes_id=" + lotes_id +
                     "&barriles_id=" + barriles_id +
                     "&fecha_entrega= " + fecha_entrega +
                     "&fecha_devolucion=" + fecha_devolucion +
                     "&monto_total=" + monto_total +
                     "&monto_pagado=" + monto_pagado +
                     "&tipo_pago=" + tipo_pago +
                     "&entregado=" + entregado +
                     "&cantidad=" + cantidad; 

 
             agregardatos(cadena);


     
       ////////////////////// PASO TRES DENTRO DE LA FUNCION//////////////////
 
       var tds=$("#tablaDinamicaLoad tr:first td").length;//numero de columnas

             
       var trs=$("#tablaDinamicaLoad tr").length;//numero de filas contando el thead

       
       var index1 = new Date().getUTCMilliseconds();
       // <tr id="row_first">

       var nuevaFila="<tr id='row_"+index1+"'>";

    
       for(var i=0;i<tds;i++){
          if(i==0){
              nuevaFila+="<td hidden><input type='text'  id='idBarril_"+index1+"' value='' disabled class='inpWhite'></td>" 
          }else if(i==1){
              nuevaFila+="<td hidden><input type='text'  id='id_"+index1+"' value='' disabled class='inpWhite'></td>" 
          }else if(i==2){
              nuevaFila+="<td><input type='text' id='deploy_"+index1+"' value='' onkeyup='functionDeployBC(&quot;"+index1+"&quot;)'></td>"
          }else if(i==3){    
              nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"   
          }else if(i==4){  
              nuevaFila+="<td> <input id='descripcion_"+index1+"' size='44' type='text' value='' disabled class='inpGreen'></td>"       
          }else if(i==5){ 
              nuevaFila+="<td> <input id='precioUnit_"+index1+"' type='text' disabled class='inpGreen'></td>"         
          }else if(i==6){ 
              nuevaFila+="<td> <input id='cantidad_"+index1+"' type='text' class='inpGreen' size='17' disabled></td>"
          }else if(i==7){ 
              nuevaFila+="<td><input type='text'  id='subtotales_"+index1+"' value='' disabled class='inpGreen'></td>"   
          }else if(i==8){    
              nuevaFila+="<td><button id='minusRow' class='btn btn-danger btn-lg' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"      
          }else{

           nuevaFila+="<td></td>";
           // index1++;
           // index2++;
       }

       }
       nuevaFila+="</tr>";
       
       $("#tablaDinamicaLoad").append(nuevaFila);
       
       $('#num_cliente').prop('disabled', true);
       $('#tipo_comprobante').prop('disabled', true);
       $('#prov_cliente').prop('disabled', true);
       $('#forma_pago').prop('disabled', true);
       $('#fecha_contable').prop('disabled', true);
       

       
    }

//focusCodigoArticulo(index1);
}
         

//****************************************************************************************************************** */
//****************************************************************************************************************** */


function addRow(i){
    
 
//1- Si en ves de tomar la fecha_contable que SE MUESTRA MAL en el input, voy a buscarla tal como es en la base de datos?? 
//2- Si sale bien. hacer lo mismo con addRowReturn

 verificoCod = $('#deploy_'+i).val();


    if(verificoCod == ""){

        alertify.warning('Datos incompletos...');
       

    } else{
        
      $('#plus_'+i).prop('disabled', 'disabled');
      $('#plus_'+i).removeClass('btn-info');
      $('#plus_'+i).removeClass('active');
      $('#plus_'+i).addClass('btn-secondary');
      
      $('#deploy_'+i).prop('disabled', 'disabled');
      $('#cantidad_'+i).prop('disabled', 'disabled');
      $('#subtotales_'+i).prop('disabled', 'disabled');


            cliente_id = $('#clientes_id').val();//codigo del cliente

            lotes_id = $('#id_'+i).val();//codigo del lote
             
            barriles_id = $('#idBarril_'+i).val();//id de barril
            
            fecha_entrega = $('#fecha_contable').val();
            
            fecha_devolucion = $('#fecha_contable').val();
            
            precio_neto = $('#precioUnit_'+i).val().substring(2,15);
            
            cantidad = $('#cantidad_'+i).val();
            
            monto_total = precio_neto*cantidad; 
            
            monto_pagado = precio_neto*cantidad; 
            
            tipo_pago = $('#forma_pago').val();
            
            entregado = 1; 
                        
            $('#subtotales_'+i).val('$ '+monto_pagado);                

//               *************************************************************

             cadena= "cliente_id=" + cliente_id +
                     "&id_sw= " + i +
                     "&lotes_id=" + lotes_id +
                     "&barriles_id=" + barriles_id +
                     "&fecha_entrega= " + fecha_entrega +
                     "&fecha_devolucion=" + fecha_devolucion +
                     "&monto_total=" + monto_total +
                     "&monto_pagado=" + monto_pagado +
                     "&tipo_pago=" + tipo_pago +
                     "&entregado=" + entregado; 
 
             agregardatos(cadena);


     
       ////////////////////// PASO TRES DENTRO DE LA FUNCION//////////////////
 
       var tds=$("#tablaDinamicaLoad tr:first td").length;//numero de columnas

             
       var trs=$("#tablaDinamicaLoad tr").length;//numero de filas contando el thead

       
       var index1 = new Date().getUTCMilliseconds();
       // <tr id="row_first">

       var nuevaFila="<tr id='row_"+index1+"'>";

    
      for(var i=0;i<tds;i++){
          if(i==0){
              nuevaFila+="<td hidden><input type='text'  id='idBarril_"+index1+"' value='' disabled class='inpWhite'></td>" 
          }else if(i==1){
              nuevaFila+="<td hidden><input type='text'  id='id_"+index1+"' value='' disabled class='inpWhite'></td>" 
          }else if(i==2){
              nuevaFila+="<td><input type='text' id='deploy_"+index1+"' value='' onkeyup='functionDeployBC(&quot;"+index1+"&quot;)'></td>"
          }else if(i==3){    
              nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"   
          }else if(i==4){  
              nuevaFila+="<td> <input id='descripcion_"+index1+"' size='44' type='text' value='' disabled class='inpGreen'></td>"       
          }else if(i==5){ 
              nuevaFila+="<td> <input id='precioUnit_"+index1+"' type='text' disabled class='inpGreen'></td>"         
          }else if(i==6){ 
              nuevaFila+="<td> <input id='cantidad_"+index1+"' type='text' class='inpGreen' size='17' disabled></td>"
          }else if(i==7){ 
              nuevaFila+="<td><input type='text'  id='subtotales_"+index1+"' value='' disabled class='inpGreen'></td>"   
          }else if(i==8){    
              nuevaFila+="<td><button id='minusRow' class='btn btn-danger btn-lg' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"      
          }else{

           nuevaFila+="<td></td>";
           // index1++;
           // index2++;
       }

       }
       nuevaFila+="</tr>";
       
       $("#tablaDinamicaLoad").append(nuevaFila);

       $('#plusRow_first').prop('disabled', 'disabled');


    }

//   focusCodigoArticulo(index1);                     
}
                 
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// function insertSeatPlus(){

//     load('componentes/retomartabla.php');

// }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addRowReturn(datos){

seat = 'seat=' + $('#inputSeat').val(); //NUMERO DE ASIENTO



        $.ajax({
            type:"POST",
            url: "componentes/buscarFechaContable.php",
            data:seat,
            })
            .done(function(resultado){
               fecha = resultado;      
            })
            .fail(function(resultado){
                
            })

    d = datos.split('||');

    name = d[18];
    descripcion = d[12];
    fecha_op = d[8];
    fecha_vto = d[7];

    // ***************************************************************************************************


    verificarName = $('#name_first').val();
    verificarDebe = $('#debe_first').val();
    verificarHaber = $('#haber_first').val();

    verificarDesc = $('#descripcion_first').val();

    fecha_contable = fecha; 

    if((verificarDesc == "") || (verificarName == "") || ((verificarDebe == "")&&(verificarHaber == ""))){

        alertify.warning('Datos incompletos...');
      
    } else{
        

        var tds=$("#tablaDinamicaLoad tr:first td").length;//numero de columnas


        var trs=$("#tablaDinamicaLoad tr").length;//numero de filas contando el thead


        var index1 = new Date().getUTCMilliseconds();
        // <tr id="row_first">

        var nuevaFila="<tr id='row_"+index1+"'>";

      
      
        for(var i=0;i<tds;i++){
        if(i==0){
            nuevaFila+="<td hidden><input type='text'  id='id_"+index1+"' value='' disabled class='inpWhite'></td>" 
        }else if(i==1){
            nuevaFila+="<td><input type='text' id='deploy_"+index1+"' value='' onkeyup='functionDeploy(&quot;"+index1+"&quot;)'></td>"
        }else if(i==2){
            nuevaFila+="<td><button id='plusReturn' class='btn btn-info' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"
        }else if(i==3){    
            nuevaFila+="<td> <input id='name_"+index1+"' type='text' value='' disabled class='inpGreen'></td>"     
        }else if(i==4){  
            nuevaFila+="<td> <input id='descripcion_"+index1+"' type='text' size='44' value='"+descripcion+"'></td>"       
        }else if(i==5){ 
            nuevaFila+="<td> <input id='fechaOp_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='17' value='"+fecha_op+"'></td>"       
        }else if(i==6){ 
            nuevaFila+="<td> <input id='fechaVto_"+index1+"' min='"+fecha_contable+"' type='date' class='form-control input-lg' size='15' value='"+fecha_vto+"'></td>"
        }else if(i==7){ 
            nuevaFila+="<td><input type='text'  id='debe_"+index1+"' class='inpWhite' value='' onclick='disableHaber(&quot;"+index1+"&quot;)'></td>" 
        }else if(i==8){    
                nuevaFila+="<td><input type='text'  id='haber_"+index1+"' class='inpWhite' value='' onclick='disableDebe(&quot;"+index1+"&quot;)'></td>"   
        }else if(i==9){    
            nuevaFila+="<td><button id='minusRow' class='btn btn-danger' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"   
            
        }else{

        nuevaFila+="<td></td>";
        // index1++;
        // index2++;
    }

    }
    nuevaFila+="</tr>";
                    
    $("#tablaDinamicaLoad").append(nuevaFila);



    $('#first_plusReturn').prop('disabled', 'disabled');


    
    }

                                       
}
                 








//****************************************************************************************************************** */
//****************************************************************************************************************** */




    function agregardatos(cadena){
//          alert(cadena);
//          return false;

          $.ajax({
            type:"POST",
            url:"renglon_comp/renglon_save.php",
            data:cadena,
            })
            .done(function(resultado){
                alertify.success("Agregado con exito!");
                updateBarril(cadena);
                setInputTotal(cadena);
                actualizarCocciones(cadena);
//              alert(JSON.parse(resultado));
//              return false;
            })
        
            .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

            })
    }



//--------------

    function updateBarril(cadena){
         $.ajax({
            type:"POST",
            url:"renglon_comp/update_barril.php",
            data:cadena,
            })
            .done(function(resultado){
                alertify.success("Barril actualizado con exito!");
//              alert(JSON.parse(resultado));
//              return false;
            })
        
            .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

            })
        
    }

//----------------------------------------------------------------

    function cancelarVentaBarril(){
        
        barriles_id = 'barriles_id=' + $('#idBarril_first').val();//id de barril
        
         $.ajax({
            type:"POST",
            url:"renglon_comp/cancelarVenta.php",
            data:barriles_id,
            })
            .done(function(resultado){
                location.reload();

            })
        
            .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

            })
        
    }

    function cargadofalse(){
// consulto si hay algun registro que tenga cargadoOk = 0 ..., si es asi LE DOY A TODOS CARGADOOK = 0 !!

        $.ajax({
            url: "verificocargado.php",
            })
            .done(function(resultado){

                })
        
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })


}







    //*********************************************************************************************** */

    function setInputTotal(cadena){

        $.ajax({
            type:"POST",
            url:"renglon_comp/total.php",
            data:cadena,
            })
            .done(function(resultado){
                
                total = JSON.parse(resultado);

                $('#inpTotal').val('$ '+total);

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }


    
    function setInputHaberTotal(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        $.ajax({
            type: "POST",
            url:"renglon/total_haber.php",
            })
            .done(function(resultado){
                
                total = JSON.parse(resultado);
                
                // sum = total[0].total;
          
                $('#inpHaber').val(total);

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }

    //******************************************************************************************************************************** */

    
    // function setInputDebeDif(asiento){
        function setInputDebeDif(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        // seat = 'seat=' + asiento; 
        $.ajax({
            // type: "POST",
            url:"renglon/dif_debe.php",
            // data: seat,
            })
            .done(function(resultado){
                
                res = JSON.parse(resultado);

          
                $('#totalDebe').val(res);

                // $('#tabla').load('componentes/tabla.php'); 
                $('#menuselect').load('componentes/selectmenu.php');

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }

    function setInputHaberDif(){
        //VOY AL SERVIDOR Y LE PIDO TODAS LOS DEBE DEL RENGLON ACTUAL --> ME DEVUELVE LA SUMA (primero intentar Navicat)
        // SELECT SUM(debe) FROM renglon 
        $.ajax({
            type: "POST",
            url:"renglon/dif_haber.php",
            })
            .done(function(resultado){
                
                res = JSON.parse(resultado);
                
                // dif = res[0].diferencia;
          
                $('#totalHaber').val(res);

                  })
         
                .fail(function(resultado){
                    console.log('No SE PUDOOOOOOOOOO!!!')

                })

    }

   
    //************************************ BOTON CANCELAR **********************************************************//

    function pregutarSiNo () { 
        cliente_id = 'cliente_id= ' + $('#clientes_id').val();//codigo del cliente
        

        alertify.confirm('CANCELAR VENTAS', '¿Está seguro que quiere cancelar las ventas?', 

        function () { 
            eliminarVentas(cliente_id) }, 

        function(){ 
            alertify.warning('Se cancelo')
        });

    }
        

    function eliminarVentas(cliente_id){
        $.ajax({
            type: "POST",
            url: "renglon_comp/ventas_destroy.php",
            data:cliente_id,
            
            success: function (r) {
                if(r==1){
                    cancelarVentaBarril();
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    //***************************  BOTON CARGAR ************************************************ */


// ///////////////////////////////////////////////////////////////////////////////

    function insertComprobante(cadena){
//        alert(cadena);
//        return(false); 
           
        $.ajax({
            type:"POST",
            // url: "componentes/save_asientoDefinitivo.php",
            url: "componentes/saveEncabezadoPie.php",
            data:cadena,
            })
            .done(function(resultado){
                EraserToDefinitive();
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
 
    }


    // ///////////////////////////////////////////////////////////////////////////////

    function preguntarRegisterOk(){


        seat = 'seat=' + $('#inputSeat').val();

        $.ajax({
            type:"GET",
            // url: "componentes/save_asientoDefinitivo.php",
            url: "componentes/consultCargaOk.php",
            data:seat,
            })
            .done(function(resultado){

                // alert(resultado);
                // return(false); 

                    if(resultado == 0){
                        alertify.alert('ERROR!', 'El asiento no se encutra cargado aún!') 
                    }else{
                        // num_asiento = seat; 
                        registerSeat(seat); 
                    }
                
                
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            })

    }




    function registerSeat(num_asiento){

    
        tipo_asiento = $('#inputTypeSeat').val();

    

        cadena= "num_asiento=" + num_asiento +
        "&tipo_asiento=" + tipo_asiento;

        // alert(cadena);
        // return false;
               
        $.ajax({
            type:"GET",
            url: "componentes/save_asientoDefinitivo.php",
            data:cadena,
            })
            .done(function(resultado){
//                     alert(resultado);
//                     return false;

                if(resultado == 1){
                    typeSeat = "ASIENTO DE APERTURA";
                    alertify.notify(typeSeat+" "+"registrado con éxito!");
//                    $('#tabla').load('componentes/tabla.php')
                    updateMayor();

                }else if(resultado == 9){
                    typeSeat = "ASIENTO DE CIERRE";
                    alertify.notify(typeSeat+" "+"registrado con éxito!");
//                    $('#tabla').load('componentes/tabla.php')
                      location.reload();
                }else{
                    alertify.notify("ASIENTO REGISTRADO EXITOSAMENTE !");
//                    $('#tabla').load('componentes/tabla.php'); 
                      location.reload();
                }

            close_session();    
            })
    
        .fail(function(resultado){
            // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

        })

    }    
    



// -----------------------------------------------------------
    function close_session(){

        $.ajax({
            url: "cerrarsession.php",
            success: function (r) {
                if(r==1){
                    // alertify.success("SE HA CERRADO SESSION!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }




    function  disabledTypeSeat(asiento){



        if(asiento == 1){

                console.log(asiento); 

        }else if(asiento == 9){

            console.log(asiento); 

        }           
    }    








    function updateMayor(){

        $.ajax({
            // type:"GET",
            url: "componentes/updateFechaMayor.php",
            // data:seat,
            })
            .done(function(resultado){

                // alert(resultado);
                // return false; 
                location.reload();
                alertify.notify("MAYOR ACTUALIZADO CORRECTAMENTEEEEE !")



            })

        .fail(function(resultado){


        })

    }


// ******************************************************

   
//    ----------------------------------------------------------------------------------

    function EraserToDefinitive(){
         $.ajax({
                url: "componentes/EraserToDefinitive.php",
                })
                .done(function(resultado){
//                    alertify.notify("EraserToDefinitive CORRECTAMENTEEEEE !");
//                    $('#encabezado').load('componentes/encabezado.php');
//                    $('#tabla').load('componentes/tabla_articulos.php'); 
                    redireccionarPag();
                })
                .fail(function(resultado){

                })
        
    }
    
//    -------------------------------------------------

    function redireccionarPag(){
        window.location= "../comprobantes/salidaComprobante/comprobante.php"
    }

//-----------------------------------------------------



//------------------------------------------------------
    function focusCantidad(numero){
       $('#cantidad_'+numero).focus(); 
    }
//-------------------------------------------------------

    function focusTipoComprobante(){
       $('#tipo_comprobante').focus(); 
    }

//--------------------------------------------------------

    function focusFormaPago(){
           $('#forma_pago').focus(); 
    }

//--------------------------------------------------------

    function focusCodigoArticulo(numero){
           $('#deploy_'+numero).focus(); 
           console.log('NUMERO=' + numero);
    }
    
    //--------------------------------------------------------
    
    function setFechaMin(){
        punto_venta = $('#punto_venta').val();
        tipo_comprobante = $('#id_comprobante').val();

        cadena = 'pto_venta=' + punto_venta +
                '&tipo_comprobante=' + tipo_comprobante; 

        $.ajax({
                type:"POST",
                url: "componentes/setFechaMin.php",
                data:cadena,
                })
                .done(function(resultado){
               
                    fechaMin = JSON.parse(resultado);
                    $('#fecha_contable').attr('min' , fechaMin);
                    $('#fecha_contable').prop('disabled' , false);

                })
                .fail(function(resultado){

                })

    }
    
//    -----------------------------------------------------------------------------------------------


    function activeBtnFiltrarFechas(){

       fecha1 = $('#fecha1').val(); 
       fecha2 = $('#fecha2').val(); 
       
        if((fecha1 != '')&&(fecha2 != '')){
            $('#divBtnFiltrar').prop('hidden', false); 
        }else{
            $('#divBtnFiltrar').prop('hidden', true);  
        }   
    }
    
    
//------------------------------------------------------------------

    function actualizarCocciones(cadena){
//       alert(cadena);
//       return false;
         $.ajax({
            type:"POST",
            url:"renglon_comp/actualizar_coccion.php",
            data:cadena,
            success:function(r){
    //            if(r==1){
    //                 $('#tabla_cocciones').load('componentes/tabla_cocciones.php'); 
                    alertify.success("ACCCCCCCCCCCTUALIZADO!");
    //            }else{
    //                alertify.error("Hubo un fallo en cocciones!");
    //
    //            }
            }

            });

    }


//***********************************************************************************************************************

function functionDeploySeguimiento(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
           
                            $.get( "filtro_auditoria_ventas.php", function( dataHTML ) {
                                $( "#tabladinamica_ventas" ).html( dataHTML );
                                $('#deployVentas').modal('show');
                              });

}


function reloadPage(){
    location.reload();
}
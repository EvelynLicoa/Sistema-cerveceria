

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


    function setCodeArt(code){
        // renglon = 0; 

        $.ajax({
            type: "POST",
            url: "componentes/datos.php",
            data: code
            })
            .done(function(resultado){
                
                articulo = JSON.parse(resultado);

                id = (articulo[0].id);
                codigo = (articulo[0].cod_art);
                descripcion = (articulo[0].descripcion);
                costo_unitario = (articulo[0].costo_unitario);
                bonificacion = (articulo[0].bonificacion);
                bonificacion = (articulo[0].bonificacion);
                tipo_tasa = (articulo[0].tipo_tasa);
                impuesto_interno = (articulo[0].impuesto_interno);
                
                $.get( "filtro_articulos.php", function() {

                        $('#id_'+quienhizoenter).val(id);    
                        $('#deploy_'+quienhizoenter).val(codigo);
                        $('#descripcion_'+quienhizoenter).val(descripcion);    
                        $('#precioUnit_'+quienhizoenter).val('$ '+costo_unitario); 
                        $('#bonificacion_'+quienhizoenter).val('% '+bonificacion); 
                        $('#tasaIVA_'+quienhizoenter).val('% '+tipo_tasa);
                        $('#impInternos_'+quienhizoenter).val('$ '+impuesto_interno);
                        
//                        $('cantidad_'+quienhizoenter).focus();
                        
                            
                        $('#deploy_'+quienhizoenter).prop('disabled', true);
                        $('#deploy_'+quienhizoenter).addClass("inpWhite");

                  })
                  focusCantidad(quienhizoenter);
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

    
    function setCodeCustomer(code){
        
     
        $.ajax({
            type: "POST",
            url: "componentes/datosCustomer.php",
            data: code
            })
            .done(function(resultado){
     
                clientes = JSON.parse(resultado);


                id = (clientes[0].id);
                numero = (clientes[0].numero);
                nombre = (clientes[0].nombre);

        
                $.get( "filtro_customer.php", function() {
                        $('#num_cliente').val(numero);
                        $('#nombre_cliente').val(nombre);
                        $('#clientes_id').val(id);
                        
//                        $('#codigo_barril').focus();
           
             
                  });
   
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            }) 
    }
    
    
    
//******************************************************************************

    function setCodeBarriles(code){
     
        $.ajax({
            type: "POST",
            url: "componentes/datosBarril.php",
            data: code
            })
            .done(function(resultado){
     
                Barriles = JSON.parse(resultado);


                id = (Barriles[0].id);
                codigo = (Barriles[0].codigo);

                $.get( "filtro_customer.php", function() {
                        $('#codigo_barril').val(codigo);
                        $('#id_barril').val(id);
           
     
                  });    
             })
             .fail(function(resultado){
                console.log('No existe!!!')

            }) 
    }
//---------------------------------------------------

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

    
    function functionDeploy(i){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
        
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
                            $.get( "filtro_articulos.php", function( dataHTML ) {
                                $( "#tabladinamica" ).html( dataHTML );
                                $('#deployArticulos').modal('show');
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


function functionDeployCustomer(){ //EL PARAMETRO 'i' CONTIENE EL VALOR DE GENERADO CON ---> new Date().getUTCMilliseconds();
    
//        $('#tipo_comprobante').val('');
        
        
        if (event.keyCode == 13) {
//            alert('HOLA');
//            return false; 
                $.get( "filtro_customer.php", function( dataHTML ) {
                    $( "#tabladinamica_customer" ).html( dataHTML );
                    $('#deployCustomer').modal('show');
                  });
                        
    }
}

//****************************************************************************************************************** */

function functionDeployBarriles(){ 
    
        if (event.keyCode == 13) {

                $.get( "filtro_barriles.php", function( dataHTML ) {
                    $( "#tabladinamica_barriles" ).html( dataHTML );
                    $('#deployBarriles').modal('show');
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

     setNumComprobante();           
    }
}
//--------------------------------------------------------------------------------------------------------------------------

     function FirstRowNewComp(){

     verificoCod = $('#deploy_first').val();
     verificoCantidad = $('#cantidad_first').val();


    if((verificoCod == "")||(verificoCantidad == "")){

        alertify.warning('Datos incompletos...');
       

    } else{
        
      $('#plusRow_first').prop('disabled', 'disabled');
      $('#plusRow_first').removeClass('btn-info');
      $('#plusRow_first').removeClass('active');
      $('#plusRow_first').addClass('btn-secondary');
        
      $('#deploy_first').prop('disabled', 'disabled');
      $('#cantidad_first').prop('disabled', 'disabled');
      $('#subtotales_first').prop('disabled', 'disabled');


             id = $('#id_first').val();
             
             cod_art = $('#deploy_first').val();
             
             precio_neto = $('#precioUnit_first').val().substring(2,15);
             
             cantidad = $('#cantidad_first').val();
             
             iva = $('#tasaIVA_first').val().substring(2,15);
             
             bonificacion = $('#bonificacion_first').val().substring(2,15);
             
             impuesto_interno = $('#impInternos_first').val().substring(2,15);
             
//             ***************************************************************
//                   //aca el calculo de SUBTOTAL 
             netoTotal = precio_neto*cantidad;
             
             TotalBonificado = precio_neto*(bonificacion/100); 
             
             TotalconIva =(netoTotal+TotalBonificado)*(iva/100);
             
             ImpInterno = cantidad*impuesto_interno;
             
             Subtotal = netoTotal-TotalBonificado+TotalconIva+ImpInterno;  
             
             $('#subtotales_first').val('$ '+Subtotal);
             
             

//               *************************************************************

             cadena= "id=" + id +
                     "&cod_art=" + cod_art +
                     "&precio_neto=" + precio_neto +
                     "&id_sw= " + 1 +
                     "&cantidad=" + cantidad +
                     "&iva=" + iva +
                     "&subtotal=" + Subtotal +
                     "&bonificacion=" + bonificacion +
                     "&impuesto_interno=" + impuesto_interno;
 
             agregardatos(cadena);


     
       ////////////////////// PASO TRES DENTRO DE LA FUNCION//////////////////
 
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
              nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"
          }else if(i==3){    
              nuevaFila+="<td> <input id='descripcion_"+index1+"' size='44' type='text' value='' disabled class='inpGreen'></td>"   
          }else if(i==4){  
              nuevaFila+="<td> <input id='precioUnit_"+index1+"' type='text' disabled class='inpGreen'></td>"       
          }else if(i==5){ 
              nuevaFila+="<td> <input id='cantidad_"+index1+"' type='text' class='form-control input-lg' size='17'></td>"       
          }else if(i==6){ 
              nuevaFila+="<td> <input id='bonificacion_"+index1+"' type='text' size='15' class='inpGreen'></td>"
          }else if(i==7){ 
              nuevaFila+="<td><input type='text'  id='tasaIVA_"+index1+"' value='' disabled class='inpGreen'></td>" 
          }else if(i==8){    
              nuevaFila+="<td><input type='text'  id='impInternos_"+index1+"' value='' disabled class='inpGreen'></td>"   
          }else if(i==9){    
              nuevaFila+="<td><input type='text'  id='subtotales_"+index1+"' value='' disabled class='inpGreen'></td>"   
          }else if(i==10){    
              nuevaFila+="<td><button id='minusRow' class='btn btn-danger btn-lg' onclick='subtractrow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-minus'></span></button></td>"    
          }else{

           nuevaFila+="<td></td>";
           // index1++;
           // index2++;
       }

       }
       nuevaFila+="</tr>";
       
       $("#tablaDinamicaLoad").append(nuevaFila);
       

       
    }

focusCodigoArticulo(index1);
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


             id = $('#id_'+i).val();
             
             cod_art = $('#deploy_'+i).val();
             
             precio_neto = $('#precioUnit_'+i).val().substring(2,15);
             
             cantidad = $('#cantidad_'+i).val();
             
             iva = $('#tasaIVA_'+i).val().substring(2,15);
             
             bonificacion = $('#bonificacion_'+i).val().substring(2,15);
             
             impuesto_interno = $('#impInternos_'+i).val().substring(2,15);
             
//             ***************************************************************
//                   //aca el calculo de SUBTOTAL 
             netoTotal = precio_neto*cantidad;
             
             TotalBonificado = precio_neto*(bonificacion/100); 
             
             TotalconIva =(netoTotal+TotalBonificado)*(iva/100);
             
             ImpInterno = cantidad*impuesto_interno;
             
             Subtotal = netoTotal-TotalBonificado+TotalconIva+ImpInterno;  
             
             $('#subtotales_'+i).val('$ '+Subtotal);
             
             

//               *************************************************************

             cadena= "id=" + id +
                     "&cod_art=" + cod_art +
                     "&precio_neto=" + precio_neto +
                     "&id_sw= " + i +
                     "&cantidad=" + cantidad +
                     "&iva=" + iva +
                     "&subtotal=" + Subtotal +
                     "&bonificacion=" + bonificacion +
                     "&impuesto_interno=" + impuesto_interno;
 
             agregardatos(cadena);


     
       ////////////////////// PASO TRES DENTRO DE LA FUNCION//////////////////
 
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
              nuevaFila+="<td><button id='plus_"+index1+"' class='btn btn-info btn-lg active' onclick='addRow(&quot;"+index1+"&quot;)'><span class='glyphicon glyphicon-plus'></span></button></td>"
          }else if(i==3){    
              nuevaFila+="<td> <input id='descripcion_"+index1+"' size='44' type='text' value='' disabled class='inpGreen'></td>"   
          }else if(i==4){  
              nuevaFila+="<td> <input id='precioUnit_"+index1+"' type='text' disabled class='inpGreen'></td>"       
          }else if(i==5){ 
              nuevaFila+="<td> <input id='cantidad_"+index1+"' type='text' class='form-control input-lg' size='17'></td>"       
          }else if(i==6){ 
              nuevaFila+="<td> <input id='bonificacion_"+index1+"' type='text' size='15' class='inpGreen'></td>"
          }else if(i==7){ 
              nuevaFila+="<td><input type='text'  id='tasaIVA_"+index1+"' value='' disabled class='inpGreen'></td>" 
          }else if(i==8){    
              nuevaFila+="<td><input type='text'  id='impInternos_"+index1+"' value='' disabled class='inpGreen'></td>"   
          }else if(i==9){    
              nuevaFila+="<td><input type='text'  id='subtotales_"+index1+"' value='' disabled class='inpGreen'></td>"   
          }else if(i==10){    
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

   focusCodigoArticulo(index1);                     
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


    // jajajajajjajajajajajajajaja


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

            success:function(r){
                if(r==1){
                    // $('#tabla').load('componentes/tabla.php'); //BUENA IDEA PARA RETOMARRRRRRRRRRRR
                    alertify.success("Agregado con exito!");
                    setInputTotal();
                    


                }else{
                    alertify.error("Hubo un fallo!");
                }
            }
        });

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

    function setInputTotal(){

        $.ajax({
            url:"renglon_comp/total.php",
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


        alertify.confirm('CANCELAR COMPROBANTE', '¿Está seguro que quiere cancelar?', 

        function () { 
            eliminarRegistro() }, 

        function(){ 
            alertify.warning('Se cancelo')
        });

    }
        
      
    function eliminarRegistro(){


        $.ajax({
            url: "comprobante_destroy.php",
            success: function (r) {
                if(r==1){
                     location.reload();
//                    $('#encabezado').load('componentes/encabezado.php');
//                    $('#tabla').load('componentes/tabla_articulos.php'); 

                    alertify.success("Se cancelo correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    //***************************  BOTON CARGAR ************************************************ */


    function saveComprobante(){
        
         num_comprobante = $('#num_comprobante').val(); 
         dia = $('#fecha_contable').val();
         clientes_id = $('#clientes_id').val();
         num_comprobante = $('#num_comprobante').val();
         pto_vta = $('#punto_venta').val();
         tipos_comprobantes_id = $('#id_comprobante').val();
         cliente_sit_iva = $('#tipor_cliente').val();
         condicion_venta_id = $('#id_forma_pago').val();
         
         cadena= 'num_comprobante=' + num_comprobante +
                 '&dia=' + dia +
                 '&clientes_id=' + clientes_id +
                 '&pto_vta=' + pto_vta +
                 '&tipos_comprobantes_id=' + tipos_comprobantes_id +
                 '&cliente_sit_iva=' + cliente_sit_iva +
                 '&condicion_venta_id=' + condicion_venta_id;
         
        if(num_comprobante != ''){
            insertComprobante(cadena);
        }else{
            
            alertify.alert('ERROR al cargar', 'CAMPOS VACIOS!') 

            }       
    }



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

    function setNumComprobante(){
        punto_venta = $('#punto_venta').val();
        tipo_comprobante = $('#id_comprobante').val();

        cadena = 'pto_venta=' + punto_venta +
                '&tipo_comprobante=' + tipo_comprobante; 
        
//        alert(cadena);
//        return false; 
        $.ajax({
                type:"POST",
                url: "componentes/buscarNumComprobante.php",
                data:cadena,
                })
                .done(function(resultado){
                    
                    $('#num_comprobante').val(resultado); 
                    $('#numeroDeComprobante').removeClass('invisible');
                })
                .fail(function(resultado){

                })
    }
    
   
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
    
    
    function activeBtnFiltrarComprobantes(){

       num_comprobante1 = $('#num_comprobante1').val(); 
       num_comprobante2 = $('#num_comprobante2').val(); 
      
        if((num_comprobante1 != '')&&(num_comprobante2 != '')){
            $('#divBtnFiltrar').prop('hidden', false); 
        }else{
            $('#divBtnFiltrar').prop('hidden', true);  
        }
        
        
    }



//-----------------------

   function focusCliente(){
       $('#num_cliente').focus(); 
       
    }
    
   function focusBtnBuscaLote(){
       $('#btnBuscaLote').focus();
       $('#btnBuscaLote').prop('disabled', false);
       
   }
    
    
//    ------------------

function buscarIdLote(){
     
    barriles_id = $('#id_barril').val(); 
    clientes_id  = $('#clientes_id').val(); 
    
     
    cadena = 'barriles_id=' + barriles_id +
            '&clientes_id=' + clientes_id;

//    alert(cadena);
//    return false;

    $.ajax({
    type: "POST",
    url: "componentes/datosLotes.php",
    data: cadena
    })
    .done(function(resultado){

        Lote = JSON.parse(resultado);


        id = (Lote[0].lotes_id);

        $.get( "filtro_customer.php", function() {
                $('#lotes_id').val(id);
//                $('#lotes_id').prop('disabled', false);


          });    
          
     })
     .fail(function(resultado){
        console.log('No existe!!!')

    }) 
    

};


//------------------------------------------------------------------

function setSessionNumLote(){
    
    lotes_id  = 'lotes_id=' + $('#lotes_id').val(); 
    
    $.ajax({
        type: "GET",
        url: "componentes/setLoteInSession.php",
        data: lotes_id,
        })
        .done(function(resultado){
          window.location.href = "Trazabilidad.php";
          
            
        })
        .fail(function(resultado){
          console.log('UN PROBLEMIN')
        });
    
    
}


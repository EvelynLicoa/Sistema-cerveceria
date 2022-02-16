

function functionDeployCocciones(){
    if (event.keyCode == 13) {

                            $.get( "cocciones/filtro_cocciones.php", function( dataHTML ) {
                                $( "#tabladinamica_coccion" ).html( dataHTML );
                                $('#deployCocciones').modal('show');
                              });


                    
    }
    
    
}

//******************************************************************************
    
       function setCodeCocciones(code){
//                alert(code);
//                return false; 
            $.ajax({
                    type: "POST",
                    url: "cocciones/componentes/datosCocciones.php",
                    data: code
                    })
                    .done(function(resultado){     
                        
//                         alert('OKEY');
//                         return false; 
                        
                        tcoccion = JSON.parse(resultado);
                     
                        id = (tcoccion[0].id);
                        nombre = (tcoccion[0].nombre);
                        
                        $('#nombre_coccion').val(nombre);
                        $('#cocciones_id').val(id);
                        $('#btnMaceradoIni').focus();

                     })
                     .fail(function(resultado){
                        console.log('No existeeeeeeeeeeeeeeeeeeeeeeeeeeeee!!!')

                    })
  
    }
//******************************************************************************

  function saveInicioMacerado(){

        cocciones_id = $('#cocciones_id').val(); 
        cantidad = $('#cantidad').val(); 
     
         
         cadena= 'cocciones_id=' + cocciones_id +
                 '&cantidad=' + cantidad;

        if((cocciones_id != '')&&(cantidad != '')){
            saveIniMacerado(cadena);
        }else{
            
            alertify.alert('ERROR al cargar', 'CAMPOS INCOMPLETOS!') 

            }       
    }



// ///////////////////////////////////////////////////////////////////////////////

  function saveFinMacerado(){
      
         $.ajax({
            url: "componentes/saveFinMacerado.php",
            })
            .done(function(resultado){
//                alertify.warning('FIN DE MACERADO!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', false); 
                
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
    }



// ///////////////////////////////////////////////////////////////////////////////

 function saveIniHervor(){

         $.ajax({
            url: "componentes/saveIniHervor.php",
            })
            .done(function(resultado){
                alertify.warning('INICIO DE HERVOR!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', true); 
                $('#div_finHervor').prop('hidden', false); 
                
//----------------------------------------------------------
                $('#btnHervorFin').focus();
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
    }



// ///////////////////////////////////////////////////////////////////////////////

 function saveFinHervor(){

         $.ajax({
            url: "componentes/saveFinHervor.php",
            })
            .done(function(resultado){
//                alertify.warning('FIN DE HERVOR!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', true); 
                $('#div_finHervor').prop('hidden', true);
                $('#div_iniFermentacion').prop('hidden', false);

            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
    }



// ///////////////////////////////////////////////////////////////////////////////


 function saveIniFermentacion(){

         $.ajax({
            url: "componentes/saveIniFermentacion.php",
            })
            .done(function(resultado){
                alertify.warning('INICIO DE FERMENTACIÓN!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', true); 
                $('#div_finHervor').prop('hidden', true);
                $('#div_iniFermentacion').prop('hidden', true);
                $('#div_finFermentacion').prop('hidden', false);

                $('#btnFermentacionFin').focus();
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
    }



// ///////////////////////////////////////////////////////////////////////////////

 function saveFinFermentacion(){

         $.ajax({
            url: "componentes/saveFinFermentacion.php",
            })
            .done(function(resultado){
//                alertify.warning('FIN DE FERMENTACIÓN!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', true); 
                $('#div_finHervor').prop('hidden', true);
                $('#div_iniFermentacion').prop('hidden', true);
                $('#div_finFermentacion').prop('hidden', true);
                $('#div_iniFrio').prop('hidden', false);

            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
    }



// ///////////////////////////////////////////////////////////////////////////////

function saveIniFrio(){

         $.ajax({
            url: "componentes/saveIniFrio.php",
            })
            .done(function(resultado){
                alertify.warning('INICIO DE FRIO!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', true); 
                $('#div_finHervor').prop('hidden', true);
                $('#div_iniFermentacion').prop('hidden', true);
                $('#div_finFermentacion').prop('hidden', true);
                $('#div_iniFrio').prop('hidden', true);
                $('#div_finFrio').prop('hidden', false);

                $('#btnFrioFin').focus();
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
    }



// ///////////////////////////////////////////////////////////////////////////////

function saveFinFrio(){

         $.ajax({
            url: "componentes/saveFinFrio.php",
            })
            .done(function(resultado){
//                alertify.warning('FIN DE FRIO!');
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', true);
                $('#div_iniHervor').prop('hidden', true); 
                $('#div_finHervor').prop('hidden', true);
                $('#div_iniFermentacion').prop('hidden', true);
                $('#div_finFermentacion').prop('hidden', true);
                $('#div_iniFrio').prop('hidden', true);
                $('#div_finFrio').prop('hidden', true);

//                ATENTO ACAAAAAAAAAAAAAAAAAAAA
                  actualizarCocciones();
                  pregutarPorOtroLote();
                      
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
            
            
    }



// ///////////////////////////////////////////////////////////////////////////////














    function saveIniMacerado(cadena){
//        alert(cadena);
//        return(false); 
           
        $.ajax({
            type:"POST",
//            url: "componentes/saveEncabezadoPie.php",
            url: "componentes/saveIniMacerado.php",
            data:cadena,
            })
            .done(function(resultado){
                alertify.warning('INICIO DE MACERADO!');
                $('#cantidad').prop('disabled', true); 
                $('#nombre_coccion').prop('disabled', true); 
                
                $('#div_iniMacerado').prop('hidden', true); 
                $('#div_FinMacerado').prop('hidden', false); 
                
                $('#btnMaceradoFin').focus();
                
            })
        
            .fail(function(resultado){
                // alertify.dialog('El asiento ya esta EN EL DEFINITIVO!!!')

            });
 
    }


    // ///////////////////////////////////////////////////////////////////////////////








//****************************************************************** */

    function agregardatos(cadena){
       
          $.ajax({
            type:"POST",
            url:"compras_insumo_save.php",
            data:cadena,
            success:function(r){
                if(r==1){
                    $('#tabla_compras_insumos').load('componentes/tabla_compras_insumos.php');
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
        
        insumos_id = $('#insumos_idu').val();
        fecha_solicitud = $('#fecha_solicitudu').val();
        fecha_recibo = $('#fecha_recibou').val();
        cantidad = $('#cantidadu').val();
        monto = $('#montou').val();
        
      
        cadena= "id=" + id + 
                "&insumos_id=" + insumos_id +
                "&fecha_solicitud=" + fecha_solicitud +
                "&fecha_recibo=" + fecha_recibo +
                "&cantidad=" + cantidad +
                "&monto=" + monto;
        
        $.ajax({
        type:"POST",
        url:"compras_insumo_update.php",
        data:cadena,
        success:function(r){
            if(r==1){
                $('#tabla_compras_insumos').load('componentes/tabla_compras_insumos.php');
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
                $('#insumos_idu').val(d[1]);
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
            url: "compras_insumo_destroy.php",
            data: esteid,
            success: function (r) {
                if(r==1){
                    $('#tabla_compras_insumos').load('componentes/tabla_compras_insumos.php');
                    alertify.success("Se eliminó correctamente!");
                }else{
                    alertify.error("Hubo un fallo!");

                }
            }
        });

    }
    
    
//    --------------


   function pregutarPorOtroLote () { 

        alertify.confirm('CARGA DE LOTES', '¿Seguir cargando otro lote?', 

        function () { 
            location.reload()
        },
        function(){ 
//            alertify.warning('Se cancelo');
//              location.reload()
        })

    }


//    --------------


   function pregutarPorFinMacerado () { 

        alertify.confirm('CONFIRMAR FIN DE MACERADO', '¿Quiere finalizar macerado?', 

        function () { 
            saveFinMacerado();
  //-----------------------------------------------------------
            $('#btn_ini_fin').load('cronometro/componentes/botonesHervor.php');
            $('#inpHora').load('cronometro/componentes/hora.php');
        },
        function(){ 
            clearInterval(running_time);
        })

    }
    
    // ----------------------------------------------------------


   function pregutarPorFinHervor () { 

        alertify.confirm('CONFIRMAR FIN DE HERVOR', '¿Quiere finalizar hervor?', 

        function () { 
            saveFinHervor();
  //-----------------------------------------------------------
            $('#btn_ini_fin').load('cronometro/componentes/botonesFermentacion.php');
            $('#inpHora').load('cronometro/componentes/hora.php');
        },
        function(){ 
            clearInterval(running_time);
        })

    }


   // ----------------------------------------------------------


   function pregutarPorFinFermentacion () { 

        alertify.confirm('CONFIRMAR FIN DE FERMENTACIÓN', '¿Quiere finalizar fermentación?', 

        function () { 
            saveFinFermentacion();
  //-----------------------------------------------------------
            $('#btn_ini_fin').load('cronometro/componentes/botonesFrio.php');
            $('#inpHora').load('cronometro/componentes/hora.php');
        },
        function(){ 
            clearInterval(running_time);
        })

    }
    
    
     // ----------------------------------------------------------


   function pregutarPorFinFrio () { 

        alertify.confirm('CONFIRMAR FIN DE FRIO', '¿Quiere finalizar etapa de frio?', 

        function () { 
            saveFinFrio();
  //-----------------------------------------------------------
//            $('#btn_ini_fin').load('cronometro/componentes/botonesHervor.php');
//            $('#inpHora').load('cronometro/componentes/hora.php');
        },
        function(){ 
            clearInterval(running_time);
        })

    }
    
    
//    -----------------------------------
function actualizarCocciones(){
    cocciones_id = $('#cocciones_id').val();
    cantidad = $('#cantidad').val();
    
    cadena= 'cocciones_id=' + cocciones_id +
                 '&cantidad=' + cantidad;
    
     $.ajax({
        type:"POST",
        url:"cocciones/componentes/actualizar_coccion.php",
        data:cadena,
        success:function(r){
//            if(r==1){
//                 $('#tabla_cocciones').load('componentes/tabla_cocciones.php'); 
//                alertify.success("ACCCCCCCCCCCTUALIZADO!");
//            }else{
//                alertify.error("Hubo un fallo en cocciones!");
//
//            }
        }

        });
    
}
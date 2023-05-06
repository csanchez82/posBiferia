//EDITAR PROVEEDOR

$(".btnEditarProveedor").click(function(){

    var idProveedor=$(this).attr("idProveedor");

    var datos=new FormData();
    datos.append("idProveedor",idProveedor);

    $.ajax({

        url:"ajax/proveedores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            //console.log("respuesta",respuesta);
            
             $('#idProveedor').val(respuesta["id"]);
             $('#editarApellido1').val(respuesta["apellido1"]);
             $('#editarApellido2').val(respuesta["apellido2"]);
             $('#editarNombre').val(respuesta["nombre"]);
             $('#editarReferencia').val(respuesta["referencia"]);
             $('#editarRFC').val(respuesta["rfc"]);
             $('#editarPagoDefecto').val(respuesta["pagoDefecto"]);
             $('#editarBanco').val(respuesta["banco"]);
             $('#editarCuenta').val(respuesta["numeroCuenta"]);
             $('#editarDiasCredito').val(respuesta["diasCredito"]);
             $('#editarCLABE').val(respuesta["clabe"]);
             $('#editarSwift').val(respuesta["swift"]);
             $('#editarDiasCredito').val(respuesta["diasCredito"]);
             $('#editarCreditoDisponible').val(respuesta["creditoDisponible"]);
             $('#editarDiasEntrega').val(respuesta["diasEntrega"]);
             $('#editarGenerar').prop('checked', respuesta["generarOrdenes"]);
             $('#editarFacturable').prop('checked', respuesta["facturable"]);
             $('#editarLunes').prop('checked', respuesta["lunes"]);
             $('#editarMartes').prop('checked', respuesta["martes"]);
             $('#editarMiercoles').prop('checked', respuesta["miercoles"]);
             $('#editarJueves').prop('checked', respuesta["jueves"]);
             $('#editarViernes').prop('checked', respuesta["viernes"]);
             $('#editarSabado').prop('checked', respuesta["sabado"]);
             $('#editarDomingo').prop('checked', respuesta["domingo"]);
             $('#editarPais').val(respuesta["pais"]);
             $('#editarLocalidad').val(respuesta["localidad"]);
             $('#editarEstado').val(respuesta["estado"]);
             $('#editarCiudad').val(respuesta["ciudad"]);
             $('#editarCalle').val(respuesta["calle"]);
             $('#editarNumero').val(respuesta["numero"]);
             $('#editarColonia').val(respuesta["colonia"]);
             $('#editarCP').val(respuesta["cp"]);
             $('#editarCorreo1').val(respuesta["correo1"]);
             $('#editarCorreo2').val(respuesta["correo2"]);
             $('#editarTelefono1').val(respuesta["telefono1"]);
             $('#editarTelefono2').val(respuesta["telefono2"]);

        }
    })

})

 //ELIMINAR CLIENTE
 $(".btnEliminarProveedor").click(function(){
     var idProveedor = $(this).attr("idProveedor");   
     swal({
         title: "¿Está seguro de eliminar al proveedor?",
         text:   "Si no lo está, puede cancelar la acción",
         type:  'warning',
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         cancelButtonText: "Cancelar",
         confirmButtonText: "Si, borrar proveedor?",
     }).then((result)=>{
         if(result.value){
             window.location ="index.php?ruta=proveedores&idProveedor="+idProveedor;
         }
     })
 })
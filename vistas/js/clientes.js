//EDITAR BANCOS

$(".btnEditarClientes").click(function(){

    var idClientes = $(this).attr("idClientes");

    var datos= new FormData();
    datos.append("idClientes",idClientes);

    $.ajax({
        url: "ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarApellido1").val(respuesta["apellido1"]);
            $("#editarApellido2").val(respuesta["apellido2"]);
            $("#editarRFC").val(respuesta["rfc"]);
            $("#editarRegimen").val(respuesta["regimenFiscal_id"]);
            $("#editarNumRegistro").val(respuesta["registroIdentidadFiscal_id"]);
            $("#editarCFDI").val(respuesta["usoCFDI_id"]);
            $("#editarFormaPago").val(respuesta["formaPago_id"]);
            $("#editarCalle").val(respuesta["calle"]);
            $("#editarColonia").val(respuesta["colonia"]);
            $("#editarNumero").val(respuesta["numero"]);
            $("#editarCP").val(respuesta["cp"]);
            $("#editarLocalidad").val(respuesta["localidad"]);
            $("#editarEstado").val(respuesta["estado"]);
            $("#editarPais").val(respuesta["pais"]);
            $("#editarDiasCredito").val(respuesta["diasCredito"]);
            $("#editarLimiteCredito").val(respuesta["limiteCredito"]);
            $("#editarCorreo1").val(respuesta["correo1"]);
            $("#editarCorreo2").val(respuesta["correo2"]);
            $("#editarTel").val(respuesta["telefono"]);
            $("#editarCel").val(respuesta["celular"]);
            $("#editarNumeroCuenta").val(respuesta["numeroCuenta"]);
            
            // Asegúrate de que el id de tu modal se está actualizando correctamente.
            $("#idClientes").val(respuesta["id"]);
            
        }
    })
})

/*=============================================
ELIMINAR CLIENTES
=============================================*/
$(".btnEliminarClientes").click(function(){

    var idClientes = $(this).attr("idClientes");

    swal({
        title: '¿Está seguro de eliminar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminarlo!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=clientes&idClientes="+idClientes;

        }

    })

})

//EDITAR BANCOS

$(".btnEditarBancos").click(function(){

    var idBancos = $(this).attr("idBancos");

    var datos= new FormData();
    datos.append("idBancos",idBancos);

    $.ajax({
        url: "ajax/bancos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //console.log("respuesta",respuesta);

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarNota").val(respuesta["notas"]);
            $("#idBancos").val(respuesta["id"]);
        }
    })
})

/*=============================================
ELIMINAR DEPARTAMENTO
=============================================*/
$(".btnEliminarBanco").click(function(){

    var idBancos = $(this).attr("idBancos");

    swal({
        title: '¿Está seguro de eliminar el banco?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminarlo!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=bancos&idBancos="+idBancos;

        }

    })

})
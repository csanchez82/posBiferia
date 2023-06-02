//EDITAR IVA

$(".btnEditarIEPS").click(function(){

    var idIEPS = $(this).attr("idIEPS");

    var datos= new FormData();
    datos.append("idIEPS",idIEPS);

    $.ajax({
        url: "ajax/ieps.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //console.log("respuesta",respuesta);

            $("#editarPorcentaje").val(respuesta["porcentaje"]);
            $("#idIEPS").val(respuesta["id"]);
        }
    })
})

/*=============================================
ELIMINAR IEPS
=============================================*/
$(".btnEliminarIEPS").click(function(){

    var idIEPS = $(this).attr("idIEPS");

    swal({
        title: '¿Está seguro de borrar el IEPS?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar IEPS!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=ieps&idIEPS="+idIEPS;

        }

    })

})
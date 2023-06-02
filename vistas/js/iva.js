//EDITAR IVA

$(".btnEditarIVA").click(function(){

    var idIVA = $(this).attr("idIVA");

    var datos= new FormData();
    datos.append("idIVA",idIVA);

    $.ajax({
        url: "ajax/iva.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //console.log("respuesta",respuesta);

            $("#idIVA").val(respuesta["id"]);
            $("#editarPorcentaje").val(respuesta["porcentaje"]);
        }
    })
})

/*=============================================
ELIMINAR IVA
=============================================*/
$(".btnEliminarIVA").click(function(){

    var idIVA = $(this).attr("idIVA");

    swal({
        title: '¿Está seguro de borrar el IVA?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar IVA!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=iva&idIVA="+idIVA;

        }

    })

})
//EDITAR CATEGORÍA

$(".btnEditarDepartamento").click(function(){

    var idDepartamento = $(this).attr("idDepartamento");

    var datos= new FormData();
    datos.append("idDepartamento",idDepartamento);

    $.ajax({
        url: "ajax/departamentos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //console.log("respuesta",respuesta);

            $("#editarDepartamento").val(respuesta["departamento"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#idDepartamento").val(respuesta["id"]);
        }
    })
})

/*=============================================
ELIMINAR DEPARTAMENTO
=============================================*/
$(".btnEliminarDepartamento").click(function(){

    var idDepartamento = $(this).attr("idDepartamento");

    swal({
        title: '¿Está seguro de borrar el departamento?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría!'
    }).then(function(result){

        if(result.value){

            window.location = "index.php?ruta=departamentos&idDepartamento="+idDepartamento;

        }

    })

})
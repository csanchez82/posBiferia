//EDITAR FAMILIA

$(".btnEditarFamilia").click(function(){

    var idFamilia = $(this).attr("idFamilia");

    var datos= new FormData();
    datos.append("idFamilia",idFamilia);

    $.ajax({
        url: "ajax/familias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            //console.log("respuesta",respuesta);
            
            $("#editarDepartamentoID").val(respuesta["departamento_id"]).trigger('change'); 
            $("#editarFamilia").val(respuesta["familia"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#idFamilia").val(respuesta["id"]);
        }
    })
})

//ELIMINAR FAMILIA

$(".btnEliminarFamilia").click(function(){

    var idFamilia = $(this).attr("idFamilia");

    swal({
        title: "¿Estas seguro de eliminar la familia?",
        text: "Esta acción no se puede deshacer!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "Cancelar"
    }).then((result)=>{
            if (result.value) {
                window.location= "index.php?ruta=familias&idFamilia="+idFamilia;
            } 
})
})
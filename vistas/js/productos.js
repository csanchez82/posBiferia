/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/
$(".nuevaImagenProducto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaImagenProducto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaImagenProducto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

$(document).ready(function() {
    // EDITAR PRODUCTO
    $(".btnEditarProducto").click(function() {
        var idProducto = $(this).attr("idProducto");

        var datos = new FormData();
        datos.append("idProducto", idProducto);

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
                
                //console.log("respuesta", respuesta);

                $('#idProducto').val(respuesta["id"]);
                $('#editarNombre').val(respuesta["nombre"]);
                $('#editarTipo').val(respuesta["tipo"]);
                $('#editarDescripcion').val(respuesta["descripcion"]);
                $('#editarProveedor').val(respuesta["proveedor_id"]).trigger('change'); 
                $('#editarDepartamento').val(respuesta["departamento_id"]).trigger('change'); 
                $('#editarFamilia').val(respuesta["familia_id"]).trigger('change'); 

// Para IVA
var ivaValue = parseFloat(respuesta["iva"]).toFixed(2);
$("#editarIVA").val(ivaValue).trigger('change'); 

// Para IEPS
var iepsValue = parseFloat(respuesta["ieps"]).toFixed(2);
$("#editarIEPS").val(iepsValue).trigger('change'); 


$('#editarMinimo').val(respuesta["minInventario"]);
$('#editarMaximo').val(respuesta["maxInventario"]);
$('#editarInventario').val(respuesta["existencia"]);
$('#editarMerma').val(respuesta["merma"]);
$('#editarGranel').prop('checked', respuesta["granel"] == '1');
$('#editarOcultar').prop('checked', respuesta["ocultar"] == '1');
$('#editarIncluyeImpuestos').prop('checked', respuesta["incluyeImpuestos"] == '1');
$('#editarCod').val(respuesta["codBarras"]);
$('#editarCodAlterno').val(respuesta["codAlterno"]);
$('#editarUnidad').val(respuesta["unidadMedida"]).trigger('change'); 
$('#editarClave').val(respuesta["clave"]).trigger('change'); 
$('#editarCosto').val(respuesta["costo"]);
$('#editarPrecio1').val(respuesta["precio1"]);
$('#editarPrecio2').val(respuesta["precio2"]);
$('#editarPrecio3').val(respuesta["precio3"]);
$('#editarObligar').val(respuesta["obligar"]);
                
            
                 
            }
        });
    });

    // ELIMINAR PRODUCTO
    $(".btnEliminarProducto").click(function() {
        var idProducto = $(this).attr("idProducto");
        swal({
            title: "¿Está seguro de eliminar al producto?",
            text: "Si no lo está, puede cancelar la acción",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, borrar producto?",
        }).then((result) => {
            if (result.value) {
                window.location = "index.php?ruta=productos&idProducto=" + idProducto;
            }
        })
    });
});

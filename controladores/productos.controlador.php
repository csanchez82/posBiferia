<?php

class ControladorProductos{

    	/*=============================================
	CREAR PRODUCTOS
	=============================================*/

	static public function ctrCrearProducto(){

		//SI LA VARIABLE nuevoCliente y existe entonces comenzamos a preguntar por las variables POST
		if(isset($_POST["nuevoNombre"])){
	
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])){

				
				$tabla = "productos";

				$nuevoGranel = isset($_POST['nuevoGranel']) ? 1 : 0;
				$nuevoOcultar = isset($_POST['nuevoOcultar']) ? 1 : 0;
				$nuevoIncluyeImpuestos = isset($_POST['nuevoIncluyeImpuestos']) ? 1 : 0;
				$nuevoObligar = isset($_POST['nuevoObligar']) ? 1 : 0;
	
				$datos = array(
                    "nombre" => $_POST["nuevoNombre"],
                    "tipo" => $_POST["nuevoTipo"],
                    "descripcion" => $_POST["nuevaDescripcion"],
                    "proveedor_id" => $_POST["nuevoProveedor"],
                    "departamento_id" => $_POST["nuevoDepartamento"], 
                    "familia_id" => $_POST["nuevaFamilia"],
                    "iva"=> $_POST["nuevoIVA"],
                    "ieps" => $_POST["nuevoIEPS"],
					 "minInventario" => $_POST["nuevoMinimo"],
					 "maxInventario" => $_POST["nuevoMaximo"],
					 "existencia" => $_POST["nuevoInventario"],  
					 "merma" => $_POST["nuevaMerma"],
					 "granel" => $nuevoGranel,
					 "ocultar" => $nuevoOcultar,
					 "incluyeImpuestos" => $nuevoIncluyeImpuestos,
					 "codBarras" => $_POST["nuevoCod"],
					 "codAlterno" => $_POST["nuevoCodAlterno"],
					 "unidadMedida" => $_POST["nuevaUnidad"],
					 "clave" => $_POST["nuevaClave"],
					 "costo" => $_POST["nuevoCosto"],
					 "precio1" => $_POST["nuevoPrecio1"],
					 "precio2" => $_POST["nuevoPrecio2"],
                     "precio3" => $_POST["nuevoPrecio3"],
					 "obligar" => $nuevoObligar
				);
	
				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "productos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';



			}

		}

	}
		/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);

		return $respuesta;

	}

	    	/*=============================================
	EDITAR PRODUCTOS
	=============================================*/

	static public function ctrEditarProducto(){

		//SI LA VARIABLE editarCliente y existe entonces comenzamos a preguntar por las variables POST
		if(isset($_POST["editarNombre"])){

		

	
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])){

				
				$tabla = "productos";

				$editarGranel = isset($_POST['editarGranel']) ? 1 : 0;
				$editarOcultar = isset($_POST['editarOcultar']) ? 1 : 0;
				$editarIncluyeImpuestos = isset($_POST['editarIncluyeImpuestos']) ? 1 : 0;
				$editarObligar = isset($_POST['editarObligar']) ? 1 : 0;
	
				$datos = array(
					"id" => $_POST["id"],
                    "nombre" => $_POST["editarNombre"],
                    "tipo" => $_POST["editarTipo"],
                    "descripcion" => $_POST["editarDescripcion"],
                    "proveedor_id" => $_POST["editarProveedor"],
                    "departamento_id" => $_POST["editarDepartamento"], 
                    "familia_id" => $_POST["editarFamilia"],
                    "iva"=> $_POST["editarIVA"],
                    "ieps" => $_POST["editarIEPS"],
					 "minInventario" => $_POST["editarMinimo"],
					 "maxInventario" => $_POST["editarMaximo"],
					 "existencia" => $_POST["editarInventario"],  
					 "merma" => $_POST["editarMerma"],
					 "granel" => $editarGranel,
					 "ocultar" => $editarOcultar,
					 "incluyeImpuestos" => $editarIncluyeImpuestos,
					 "codBarras" => $_POST["editarCod"],
					 "codAlterno" => $_POST["editarCodAlterno"],
					 "unidadMedida" => $_POST["editarUnidad"],
					 "clave" => $_POST["editarClave"],
					 "costo" => $_POST["editarCosto"],
					 "precio1" => $_POST["editarPrecio1"],
					 "precio2" => $_POST["editarPrecio2"],
                     "precio3" => $_POST["editarPrecio3"],
					 "obligar" => $editarObligar
				);
	
				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "productos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';



			}

		}

	}

	//BORRAR PRODUCTO
	static public function ctrEliminarProducto(){

		if (isset($_GET["idProducto"])) {
			
			$tabla="productos";
			$datos=$_GET["idProducto"];

			$respuesta=ModeloProductos::mdlEliminarProducto($tabla,$datos);

			echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido eliminado.",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "productos";

									}
								})

					</script>';

		}


	}

}
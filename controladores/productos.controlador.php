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
					 "minFrac" => $_POST["nuevoMinimo1"],
					 "maxFrac" => $_POST["nuevoMaximo1"],  
					 "minUnit" => $_POST["nuevoMinimo2"],
					 "maxUnit" => $_POST["nuevoMaximo2"],
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
					 "existencia" => $_POST["nuevaExistencia"],
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

}
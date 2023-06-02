<?php

class ControladorProveedores{

	/*=============================================
	CREAR PROVEEDORES
	=============================================*/

	static public function ctrCrearProveedor(){

		//SI LA VARIABLE nuevoCliente y existe entonces comenzamos a preguntar por las variables POST
		if(isset($_POST["nuevoNombre"])){
	
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRFC"])){
	
				$tabla = "proveedores";
	
				// Verificar si el campo creditoDisponible es numérico
				if (is_numeric($_POST["nuevoCreditoDisponible"])) {
					// Convertir creditoDisponible a un valor decimal antes de pasarlo al modelo
					$creditoDisponible = floatval($_POST["nuevoCreditoDisponible"]);
				} else {
					// El valor no es numérico, se puede mostrar un mensaje de error al usuario
					echo'<script>
						swal({
							type: "error",
							title: "¡El campo de crédito disponible debe ser numérico!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {
								window.location = "proveedores";
							}
						})
					</script>';
					return;
				}
	
				$nuevoGenerar = isset($_POST['nuevoGenerar']) ? 1 : 0;
				$nuevoFacturable = isset($_POST['nuevoFacturable']) ? 1 : 0;
				$nuevoLunes = isset($_POST['nuevoLunes']) ? 1 : 0;
				$nuevoMartes = isset($_POST['nuevoMartes']) ? 1 : 0;
				$nuevoMiercoles = isset($_POST['nuevoMiercoles']) ? 1 : 0;
				$nuevoJueves = isset($_POST['nuevoJueves']) ? 1 : 0;
				$nuevoViernes = isset($_POST['nuevoViernes']) ? 1 : 0;
				$nuevoSabado = isset($_POST['nuevoSabado']) ? 1 : 0;
				$nuevoDomingo = isset($_POST['nuevoDomingo']) ? 1 : 0;

	
				$datos = array(
					"apellido1" => $_POST["nuevoApellido1"],
					"apellido2" => $_POST["nuevoApellido2"],
					"nombre" => $_POST["nuevoNombre"],
					"referencia" => $_POST["nuevaReferencia"],
					"rfc" => $_POST["nuevoRFC"],
					"formapagoId" => $_POST["nuevoPagoDefecto"],
					"bancoId" => $_POST["nuevoBanco"],
					"numeroCuenta" => $_POST["nuevaCuenta"],
					"clabe" => $_POST["nuevaCLABE"],
					"swift" => $_POST["nuevoSwift"],
					"diasCredito" => $_POST["nuevoDiasCredito"],
					"creditoDisponible" => $creditoDisponible,
					"generarOrdenes" => $nuevoGenerar,
					"facturable" => $nuevoFacturable,
					"lunes" => $nuevoLunes,
    				"martes" => $nuevoMartes,
    				"miercoles" => $nuevoMiercoles,
    				"jueves" => $nuevoJueves,
    				"viernes" => $nuevoViernes,
    				"sabado" => $nuevoSabado,
    				"domingo" => $nuevoDomingo,
					"pais" => $_POST["nuevoPais"],
					"estado" => $_POST["nuevoEstado"],
					"ciudad" => $_POST["nuevaCiudad"],
					"calle" => $_POST["nuevaCalle"],
					"numero" => $_POST["nuevoNumero"],
					"colonia" => $_POST["nuevaColonia"],
					"cp" => $_POST["nuevoCP"],
					"correo1" => $_POST["nuevoCorreo1"],
					"correo2" => $_POST["nuevoCorreo2"],
					"telefono1" => $_POST["nuevoTelefono1"],
					"telefono2" => $_POST["nuevoTelefono2"]
				);
	
				$respuesta = ModeloProveedor::mdlIngresarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedores";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR PROVEEDORES
	=============================================*/

	static public function ctrMostrarProveedores($item, $valor){

		$tabla = "proveedores";

		$respuesta = ModeloProveedor::mdlMostrarProveedores($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PROVEEDORES
	=============================================*/

	static public function ctrEditarProveedor(){

		//SI LA VARIABLE nuevoCliente y existe entonces comenzamos a preguntar por las variables POST
		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRFC"])){

			   	$tabla = "proveedores";

				   $editarGenerar = isset($_POST['editarGenerar']) ? 1 : 0;
				   $editarFacturable = isset($_POST['editarFacturable']) ? 1 : 0;
				   $editarLunes = isset($_POST['editarLunes']) ? 1 : 0;
				   $editarMartes = isset($_POST['editarMartes']) ? 1 : 0;
				   $editarMiercoles = isset($_POST['editarMiercoles']) ? 1 : 0;
				   $editarJueves = isset($_POST['editarJueves']) ? 1 : 0;
				   $editarViernes = isset($_POST['editarViernes']) ? 1 : 0;
				   $editarSabado = isset($_POST['editarSabado']) ? 1 : 0;
				   $editarDomingo = isset($_POST['editarDomingo']) ? 1 : 0;

			   	$datos = array( "id" => $_POST["idProveedor"],
				   				"apellido1"=>$_POST["editarApellido1"],
				   				"apellido2"=>$_POST["editarApellido2"],
				   				"nombre"=>$_POST["editarNombre"],
				   				"referencia"=>$_POST["editarReferencia"],
								"rfc"=>$_POST["editarRFC"],
					 			"formapagoId"=>$_POST["editarPagoDefecto"],
					 			"bancoId"=>$_POST["editarBanco"],
					 			"numeroCuenta"=>$_POST["editarCuenta"],
					 			"clabe"=>$_POST["editarCLABE"],
					 			"swift"=>$_POST["editarSwift"],
					 			"diasCredito"=>$_POST["editarDiasCredito"],
					 			"creditoDisponible"=>$_POST["editarCreditoDisponible"],
					 			"diasEntrega"=>$_POST["editarDiasEntrega"],
								"generarOrdenes"=>$editarGenerar,
								"facturable"=>$editarFacturable,
                                "lunes"=>$editarLunes,
                                "martes"=>$editarMartes,
                                "miercoles"=>$editarMiercoles,
                                "jueves"=>$editarJueves,
								"viernes"=>$editarViernes,
                                "sabado"=>$editarSabado,
                                "domingo"=>$editarDomingo,
					 			"pais"=>$_POST["editarPais"],
					 			"estado"=>$_POST["editarEstado"],
					 			"ciudad"=>$_POST["editarCiudad"],
					 			"calle"=>$_POST["editarCalle"],
					 			"numero"=>$_POST["editarNumero"],
					 			"colonia"=>$_POST["editarColonia"],
					 			"cp"=>$_POST["editarCP"],
					 			"correo1"=>$_POST["editarCorreo1"],
					 			"correo2"=>$_POST["editarCorreo2"],
					 			"telefono1"=>$_POST["editarTelefono1"],
					 			"telefono2"=>$_POST["editarTelefono2"]
                                );


			   	$respuesta = ModeloProveedor::mdlEditarProveedor($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proveedor ha sido editado correctamente.",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedores";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proveedores";

							}
						})

			  	</script>';



			}

		}
	}

	//BORRAR proveedor
	static public function ctrEliminarProveedor(){

		if (isset($_GET["idProveedor"])) {
			
			$tablaProveedores="proveedores";
			$tablaProductos="productos"; // Asegúrate de reemplazar esto con el nombre real de tu tabla de productos
			$idProveedor=$_GET["idProveedor"];

			// Verificar si el proveedor tiene productos asociados
			$numeroProductos = ModeloProveedor::mdlVerificarProductos($tablaProductos, $idProveedor);
			
			if ($numeroProductos > 0) {
				// El proveedor tiene productos asociados, no se puede eliminar
				echo'<script>
					swal({
						  type: "error",
						  title: "El proveedor no puede ser eliminado porque tiene productos asociados.",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
										window.location = "proveedores";
									}
								})
					</script>';
			} else {
				// El proveedor no tiene productos asociados, se puede eliminar
				$respuesta=ModeloProveedor::mdlEliminarProveedor($tablaProveedores,$idProveedor);
	
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "El proveedor ha sido eliminado.",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
											window.location = "proveedores";
										}
									})
						</script>';
				}
			}
		}
	}

}
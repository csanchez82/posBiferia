<?php

class ControladorDepartamentos{
    
    /*Agregar departamentos*/
    static public function ctrCrearDepartamento(){
        if (isset($_POST["nuevoDepartamento"])){ {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ %-]+$/', $_POST["nuevoDepartamento"])) {
                
                $tabla="departamentos";

                $datos=array ("departamento" => $_POST["nuevoDepartamento"],
                              "descripcion" => $_POST["nuevaDescripcion"]);

                $respuesta=ModeloDepartamentos::mdlIngresarDepartamento($tabla,$datos);

                if ($respuesta=="ok") {
                    echo '<script>

					swal({

						type: "success",
						title: "¡El departamento ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "departamentos";

						}

					});
				

					</script>';
                }


            }else {
                echo '<script>

                swal({

                    type: "error",
                    title: "¡El departamento no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "departamentos";

                    }

                });
            

            </script>';
            }
        }
    }
}

/*MOSTRAR DEPARTAMENTOS*/

static public function ctrMostrarDepartamentos($item,$valor) {
    
    $tabla= "departamentos";

    $respuesta=ModeloDepartamentos::mdlMostrarDepartamentos($tabla,$item,$valor);
    return $respuesta;
}

    /*Editar departamentos*/
    static public function ctrEditarDepartamento(){
        if (isset($_POST["editarDepartamento"])){ {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ %-]+$/', $_POST["editarDepartamento"])) {
                
                $tabla="departamentos";

                $datos=array ("departamento" => $_POST["editarDepartamento"],
                              "descripcion" => $_POST["editarDescripcion"],
                              "id"=>$_POST["idDepartamento"]);

                $respuesta=ModeloDepartamentos::mdlEditarDepartamento($tabla,$datos);

                if ($respuesta=="ok") {
                    echo '<script>

					swal({

						type: "success",
						title: "¡El departamento ha sido editado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "departamentos";

						}

					});
				

					</script>';
                }


            }else {
                echo '<script>

                swal({

                    type: "error",
                    title: "¡El departamento no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "departamentos";

                    }

                });
            

            </script>';
            }
        }
    }
}

//ELIMINAR DEPARTAMENTO

static public function ctrEliminarDepartamento(){

    if (isset($_GET["idDepartamento"])) {
        
        $tabla= "departamentos";
        $datos= $_GET["idDepartamento"];

        $respuesta = ModeloDepartamentos::mdlEliminarDepartamento($tabla,$datos); 

        if ($respuesta=="ok") {
            echo '<script>

            swal({

                type: "success",
                title: "¡El departamento ha sido eliminado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                if(result.value){
                
                    window.location = "departamentos";

                }

            });
        

            </script>';
        }
    }
}

}

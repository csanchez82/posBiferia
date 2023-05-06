<?php
class ControladorFamilias {
  /*Agregar familiass*/
  static public function ctrIngresarFamilia() {
    if (isset($_POST["nuevaFamilia"])){
      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ %-]+$/', $_POST["nuevaFamilia"])) {

        $tabla="familias";

        $datos=array (
          "familia" => $_POST["nuevaFamilia"],
          "descripcion" => $_POST["nuevaDescripcion"],
          "departamento_id" => $_POST["nuevoDepartamentoID"]
        );

        $respuesta=ModeloFamilias::mdlIngresarFamilia($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡La familia ha sido guardada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "familias";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡La familia no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "familias";
            }
          });
        </script>';
      }
    }
  }

  /*MOSTRAR FAMILIAS*/

  static public function ctrMostrarFamilias($item,$valor) {
      
      $tabla= "familias";

      $respuesta=ModeloFamilias::mdlMostrarFamilias($tabla,$item,$valor);
      return $respuesta;
  }

/*MOSTRAR FAMILIAS POR DEPARTAMENTO*/
static public function ctrMostrarFamiliasPorDepartamento($departamento_id) {
  $tabla = "familias";
  $item = "departamento_id";
  $valor = $departamento_id;

  $respuesta = ModeloFamilias::mdlMostrarFamilias($tabla, $item, $valor);
  return $respuesta;
}


//EDITAR FAMILIAS
 static public function ctrEditarFamilia() {
    if (isset($_POST["editarFamilia"])){
      if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ %-]+$/', $_POST["editarFamilia"])) {

        $tabla="familias";

        $datos=array (
          "departamento_id" => $_POST["editarDepartamentoID"],
          "familia" => $_POST["editarFamilia"],
          "descripcion" => $_POST["editarDescripcion"],
          "id"=> $_POST["idFamilia"]
        );

        $respuesta=ModeloFamilias::mdlEditarFamilia($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡La familia ha sido editada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "familias";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡La familia no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "familias";
            }
          });
        </script>';
      }
    }
  }

  //ELIMINAR FAMILIA
  static public function ctrEliminarFamilia(){

    if (isset($_GET["idFamilia"])) {
        
        $tabla= "familias";
        $datos= $_GET["idFamilia"];

        $respuesta = ModeloFamilias::mdlBorrarFamilia($tabla,$datos); 

        if ($respuesta=="ok") {
            echo '<script>

            swal({

                type: "success",
                title: "¡La familia ha sido eliminada correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                if(result.value){
                
                    window.location = "familias";

                }

            });
        

            </script>';
        }
    }
}

}

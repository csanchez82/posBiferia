<?php
class ControladorIEPS {
  
    /*Agregar IEPS*/
  static public function ctrCrearIEPS () {
    if (isset($_POST["nuevoPorcentaje"])){
      if (preg_match('/^[0-9.]+$/', $_POST["nuevoPorcentaje"])) {

        $tabla="ieps";

        $datos=array (
          "porcentaje" => $_POST["nuevoPorcentaje"]
        );

        $respuesta=ModeloIEPS::mdlIngresarIEPS($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡El IEPS ha sido guardada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "ieps";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡El IEPS no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "ieps";
            }
          });
        </script>';
      }
    }
  }

  /*MOSTRAR IEPS*/

  static public function ctrMostrarIEPS($item,$valor) {
      
      $tabla= "ieps";

      $respuesta=ModeloIEPS::mdlMostrarIEPS($tabla,$item,$valor);
      return $respuesta;
  }

      /*Editar IEPS*/
      static public function ctrEditarIEPS () {
        if (isset($_POST["editarPorcentaje"])){
          if (preg_match('/^[0-9.]+$/', $_POST["editarPorcentaje"])) {
    
            $tabla="ieps";
    
            $datos=array (
              "porcentaje" => $_POST["editarPorcentaje"],
              "id" => $_POST["idIEPS"],
            );
    
            $respuesta=ModeloIEPS::mdlEditarIEPS($tabla,$datos);
    
            if ($respuesta=="ok") {
              echo '<script>
                swal({
                  type: "success",
                  title: "¡El IEPS ha sido editado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "ieps";
                  }
                });
              </script>';
            }
          } else {
            echo '<script>
              swal({
                type: "error",
                title: "¡El IEPS no puede ir vacía o llevar caracteres especiales!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
              }).then(function(result){
                if(result.value){
                  window.location = "ieps";
                }
              });
            </script>';
          }
        }
      }

      //ELIMINAR IEPS

static public function ctrEliminarIEPS(){

    if (isset($_GET["idIEPS"])) {
        
        $tabla= "ieps";
        $datos= $_GET["idIEPS"];

        $respuesta = ModeloIEPS::mdlEliminarIEPS($tabla,$datos); 

        if ($respuesta=="ok") {
            echo '<script>

            swal({

                type: "success",
                title: "¡El IEPS ha sido eliminado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                if(result.value){
                
                    window.location = "ieps";

                }

            });
        

            </script>';
        }
    }
}

}
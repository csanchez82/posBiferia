<?php
class ControladorIVA {
  
    /*Agregar IVA*/
  static public function ctrCrearIVA () {
    if (isset($_POST["nuevoPorcentaje"])){
      if (preg_match('/^[0-9]+$/', $_POST["nuevoPorcentaje"])) {


        $tabla="iva";

        $datos=array (
          "porcentaje" => $_POST["nuevoPorcentaje"]
        );

        $respuesta=ModeloIVA::mdlIngresarIVA($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡El IVA ha sido guardada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "iva";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡El IVA no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "iva";
            }
          });
        </script>';
      }
    }
  }

  /*MOSTRAR IVA*/

  static public function ctrMostrarIVA($item,$valor) {
      
      $tabla= "iva";

      $respuesta=ModeloIVA::mdlMostrarIVA($tabla,$item,$valor);
      return $respuesta;
  }

      /*Editar IVA*/
      static public function ctrEditarIVA () {
        if (isset($_POST["editarPorcentaje"])){
          if (preg_match('/^[0-9]+$/', $_POST["editarPorcentaje"])) {
    
            $tabla="iva";
    
            $datos=array (
              "porcentaje" => $_POST["editarPorcentaje"],
              "id" => $_POST["idIVA"]
            );
    
            $respuesta=ModeloIVA::mdlEditarIVA($tabla,$datos);
    
            if ($respuesta=="ok") {
              echo '<script>
                swal({
                  type: "success",
                  title: "¡El IVA ha sido editado correctamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "iva";
                  }
                });
              </script>';
            }
          } else {
            echo '<script>
              swal({
                type: "error",
                title: "¡El IVA no puede ir vacía o llevar caracteres especiales!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
              }).then(function(result){
                if(result.value){
                  window.location = "iva";
                }
              });
            </script>';
          }
        }
      }

      //ELIMINAR IVA

static public function ctrEliminarIVA(){

    if (isset($_GET["idIVA"])) {
        
        $tabla= "iva";
        $datos= $_GET["idIVA"];

        $respuesta = ModeloIVA::mdlEliminarIVA($tabla,$datos); 

        if ($respuesta=="ok") {
            echo '<script>

            swal({

                type: "success",
                title: "¡El IVA ha sido eliminado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                if(result.value){
                
                    window.location = "iva";

                }

            });
        

            </script>';
        }
    }
}

}
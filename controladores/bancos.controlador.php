<?php
class ControladorBancos {
  
    /*Agregar BANCO*/
  static public function ctrCrearBanco () {
    if (isset($_POST["nuevoNombre"])){
      if (preg_match('/^[A-Za-z0-9 ]+$/', $_POST["nuevoNombre"])) {


        $tabla="bancos";

        $datos=array (
          "nombre" => $_POST["nuevoNombre"],
          "notas" => $_POST["nuevaNota"],
        );

        $respuesta=ModeloBancos::mdlIngresarBanco($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡El banco ha sido guardada correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "bancos";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡El banco no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "bancos";
            }
          });
        </script>';
      }
    }
  }

  /*MOSTRAR BANCOS*/

  static public function ctrMostrarBanco($item,$valor) {
      
      $tabla= "bancos";

      $respuesta=ModeloBancos::mdlMostrarBanco($tabla,$item,$valor);
      return $respuesta;
  }

  //EDITAR BANCOS
  static public function ctrEditarBanco () {
    if (isset($_POST["editarNombre"])){
      if (preg_match('/^[A-Za-z0-9 ]+$/', $_POST["editarNombre"])) {


        $tabla="bancos";

        $datos=array (
          "nombre" => $_POST["editarNombre"],
          "notas" => $_POST["editarNota"],
          "id" => $_POST["idBancos"]
        );

        $respuesta=ModeloBancos::mdlEditarBanco($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡El banco ha sido editado correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "bancos";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡El banco no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "bancos";
            }
          });
        </script>';
      }
    }
  }


      //ELIMINAR BANCO

static public function ctrEliminarBanco(){

    if (isset($_GET["idBancos"])) {
        
        $tabla= "bancos";
        $datos= $_GET["idBancos"];

        $respuesta = ModeloBancos::mdlEliminarBanco($tabla,$datos); 

        if ($respuesta=="ok") {
            echo '<script>

            swal({

                type: "success",
                title: "¡El banco ha sido eliminado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                if(result.value){
                
                    window.location = "bancos";

                }

            });
        

            </script>';
        }
    }
}

}
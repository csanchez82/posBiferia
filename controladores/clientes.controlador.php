<?php
class ControladorClientes {
  
    /*AGREGAR CLIENTE*/
  static public function ctrCrearCliente() {
    if (isset($_POST["nuevoRFC"])){
      if (preg_match('/^[A-Za-z0-9 ]+$/', $_POST["nuevoRFC"])) {


        $tabla="clientes";

        $datos = array (
            "apellido1" => $_POST["nuevoApellido1"],
            "apellido2" => $_POST["nuevoApellido2"],
            "nombre" => $_POST["nuevoNombre"],
            "rfc" => $_POST["nuevoRFC"],
            "regimenFiscal_id" => $_POST["nuevoRegimen"],
            "registroIdentidadFiscal_id" => $_POST["nuevoNumRegistro"],
            "usoCFDI_id" => $_POST["nuevoCFDI"],
            "formaPago_id" => $_POST["nuevaFormaPago"],
            "calle" => $_POST["nuevaCalle"],
            "colonia" => $_POST["nuevoColonia"],
            "numero" => $_POST["nuevoNumero"],
            "cp" => $_POST["nuevoCP"],
            "localidad" => $_POST["nuevaLocalidad"],
            "municipio" => $_POST["nuevoMunicipio"],
            "estado" => $_POST["nuevoEstado"],
            "pais" => $_POST["nuevoPais"],
            "diasCredito" => $_POST["nuevoDiasCredito"],
            "limiteCredito" => $_POST["nuevoLimiteCredito"],
            "correo1" => $_POST["nuevoCorreo1"],
            "correo2" => $_POST["nuevoCorreo2"],
            "telefono" => $_POST["nuevoTel"],
            "celular" => $_POST["nuevoCel"],
            "numeroCuenta" => $_POST["nuevoNumeroCuenta"],
          );
          

        $respuesta=ModeloClientes::mdlIngresarCliente($tabla,$datos);

        if ($respuesta=="ok") {
          echo '<script>
            swal({
              type: "success",
              title: "¡El cliente ha sido registrado exitosamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result){
              if(result.value){
                window.location = "clientes";
              }
            });
          </script>';
        }
      } else {
        echo '<script>
          swal({
            type: "error",
            title: "¡El cliente no puede ir vacía o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
          }).then(function(result){
            if(result.value){
              window.location = "cliente";
            }
          });
        </script>';
      }
    }
  }

  /*MOSTRAR CLIENTES*/

  static public function ctrMostrarClientes($item,$valor) {
      
      $tabla= "clientes";

      $respuesta=ModeloClientes::mdlMostrarClientes($tabla,$item,$valor);
      return $respuesta;
  }

     //EDITAR CLIENTE*/
     static public function ctrEditarCliente() {
        if (isset($_POST["editarRFC"])){
          if (preg_match('/^[A-Za-z0-9 ]+$/', $_POST["editarRFC"])) {
    
    
            $tabla="clientes";
    
            $datos = array (
                "id" => $_POST["idClientes"],
                "apellido1" => $_POST["editarApellido1"],
                "apellido2" => $_POST["editarApellido2"],
                "nombre" => $_POST["editarNombre"],
                "rfc" => $_POST["editarRFC"],
                "regimenFiscal_id" => $_POST["editarRegimen"],
                "registroIdentidadFiscal_id" => $_POST["editarNumRegistro"],
                "usoCFDI_id" => $_POST["editarCFDI"],
                "formaPago_id" => $_POST["editarFormaPago"],
                "calle" => $_POST["editarCalle"],
                "colonia" => $_POST["editarColonia"],
                "numero" => $_POST["editarNumero"],
                "cp" => $_POST["editarCP"],
                "localidad" => $_POST["editarLocalidad"],
                "municipio" => $_POST["editarMunicipio"],
                "estado" => $_POST["editarEstado"],
                "pais" => $_POST["editarPais"],
                "diasCredito" => $_POST["editarDiasCredito"],
                "limiteCredito" => $_POST["editarLimiteCredito"],
                "correo1" => $_POST["editarCorreo1"],
                "correo2" => $_POST["editarCorreo2"],
                "telefono" => $_POST["editarTel"],
                "celular" => $_POST["editarCel"],
                "numeroCuenta" => $_POST["editarNumeroCuenta"],
              );
              
    
            $respuesta=ModeloClientes::mdlEditarCliente($tabla,$datos);
    
            if ($respuesta=="ok") {
              echo '<script>
                swal({
                  type: "success",
                  title: "¡El cliente ha sido editado exitosamente!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                }).then(function(result){
                  if(result.value){
                    window.location = "clientes";
                  }
                });
              </script>';
            }
          } else {
            echo '<script>
              swal({
                type: "error",
                title: "¡El cliente no puede ir vacía o llevar caracteres especiales!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
              }).then(function(result){
                if(result.value){
                  window.location = "cliente";
                }
              });
            </script>';
          }
        }
      }

      //ELIMINAR CLIENTES

static public function ctrEliminarCliente(){

    if (isset($_GET["idClientes"])) {
        
        $tabla= "clientes";
        $datos= $_GET["idClientes"];

        $respuesta = ModeloClientes::mdlEliminarCliente($tabla,$datos); 

        if ($respuesta=="ok") {
            echo '<script>

            swal({

                type: "success",
                title: "¡El cliente ha sido eliminado correctamente!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result){

                if(result.value){
                
                    window.location = "clientes";

                }

            });
        

            </script>';
        }
    }
}

}
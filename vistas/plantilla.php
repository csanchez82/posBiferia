<?php
session_start();

// // Tiempo máximo de inactividad en segundos (10 minutos)
// $inactive = 600;

// // Comprobar si la variable de sesión de "último acceso" está configurada
// if (isset($_SESSION['last_access']) && (time() - $_SESSION['last_access'] > $inactive)) {
//     // Si han pasado más de 10 minutos, destruir la sesión y redirigir a la página de inicio de sesión
//     session_destroy();
//     header("Location: login");
//     exit;
// }

// // Actualizar la hora de último acceso en la variable de sesión
// $_SESSION['last_access'] = time();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS - La Bifería</title>
    <link rel="shortcut icon" href="vistas/dist/img/plantilla/593.png" type="image/x-icon">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="vistas/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="vistas/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="vistas/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="vistas/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="vistas/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="vistas/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--SweetAlert2-->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrcss">
    <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.css">


    <!--SCRIPTS-->
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.js"></script>
    <!-- jQuery -->
    <script src="vistas/plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- bs-custom-file-input -->
    <script src="vistas/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="vistas/plugins/datatables/jquery.dataTables.js"></script>
    <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
    <script src="vistas/plugins/jszip/jszip.js"></script>
    <script src="vistas/plugins/pdfmake/pdfmake.js"></script>
    <script src="vistas/plugins/pdfmake/vfs_fojs"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.js"></script>

</head>

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vistas/dist/img/plantilla/bife.png" alt="Logo" height="300" width="300">
</div>



<body class="hold-transition dark-mode sidebar-mini">
    <!-- Site wrapper -->


    <!--=====================================
CUERPO DOCUMENTO
======================================-->

    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

        <?php

 if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

  echo '<div class="wrapper">';

   /*=============================================
   CABEZOTE
   =============================================*/

   include "modulos/header.php";

   /*=============================================
   MENU
   =============================================*/

   include "modulos/navbar.php";

   /*=============================================
   CONTENIDO
   =============================================*/

   if(isset($_GET["ruta"])){

     if($_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "empresa" ||
        $_GET["ruta"] == "sucursales" || 
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "departamentos" ||
        $_GET["ruta"] == "familias" ||
        $_GET["ruta"] == "proveedores" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "productos" ||
        $_GET["ruta"] == "salir"){

       include "modulos/".$_GET["ruta"].".php";

     }else{

       include "modulos/404.php";

     }

   }else{

     include "modulos/inicio.php";

   }

   /*=============================================
   FOOTER
   =============================================*/

   include "modulos/footer.php";

   echo '</div>';

 }else{

   include "modulos/login.php";

 }

 ?>

        <script src="vistas/js/usuarios.js"></script>
        <script src="vistas/js/departamentos.js"></script>
        <script src="vistas/js/familias.js"></script>
        <script src="vistas/js/varios.js"></script>
        <script src="vistas/js/proveedores.js"></script>
        <script>
        $(function() {
            bsCustomFileInput.init();
        });
        </script>
        <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        </script>


    </body>

</html>
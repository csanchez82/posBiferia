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
    <link rel="shortcut icon" href="vistas/dist/img/plantilla/bife.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- jQuery -->
    <script src="vistas/plugins/jquery/jquery.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
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
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--SweetAlert2-->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.css">

    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.js"></script>
    <!-- jQuery Mapael -->
    <script src="vistas/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="vistas/plugins/raphael/raphael.min.js"></script>
    <script src="vistas/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="vistas/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="vistas/plugins/chart.js/Chart.min.js"></script>
    <!-- Select2 -->
    <script src="vistas/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="vistas/plugins/datatables/jquery.dataTables.js"></script>
    <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
    <script src="vistas/plugins/jszip/jszip.js"></script>
    <script src="vistas/plugins/pdfmake/pdfmake.js"></script>
    <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.js"></script>
    <!-- InputMask -->
    <script src="vistas/plugins/moment/moment.min.js"></script>
    <script src="vistas/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- jQuery Mapael -->
    <script src="vistas/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="vistas/plugins/raphael/raphael.js"></script>
    <script src="vistas/plugins/jquery-mapael/jquery.mapael.js"></script>
    <script src="vistas/plugins/jquery-mapael/maps/usa_states.js"></script>
    <!-- ChartJS -->
    <script src="vistas/plugins/chart.js/Chart.js"></script>
    <!-- bs-custom-file-input -->
    <script src="vistas/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

</head>
</body>

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

     if($_GET["ruta"] == "bancos" ||
        $_GET["ruta"] == "empresa" ||
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "ieps" ||
        $_GET["ruta"] == "iva" ||
        $_GET["ruta"] == "opciones-productos" ||
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

        <script src="vistas/js/bancos.js"></script>
        <script src="vistas/js/clientes.js"></script>
        <script src="vistas/js/departamentos.js"></script>
        <script src="vistas/js/familias.js"></script>
        <script src="vistas/js/ieps.js"></script>
        <script src="vistas/js/iva.js"></script>
        <script src="vistas/js/plantilla.js"></script>
        <script src="vistas/js/productos.js"></script>
        <script src="vistas/js/proveedores.js"></script>
        <script src="vistas/js/usuarios.js"></script>
        <script src="vistas/js/familiasPorDepartamento.js"></script>

        <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })
        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
        </script>


    </body>

</html>
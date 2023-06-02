//HACER TOOLTIPS
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();

  // Obtener referencia al campo de selección de tipo de producto y al contenedor del cuarto renglón
  const campoTipo = $('#campo-tipo');
  const renglonInventario = $('#renglon-inventario');

  // Agregar evento change al campo de selección de tipo de producto
  campoTipo.change(function() {
      if (campoTipo.val() === 'Servicio') {
          // Si se selecciona "Servicio", ocultar el cuarto renglón
          renglonInventario.hide();
      } else {
          // Si se selecciona cualquier otro tipo, mostrar el cuarto renglón
          renglonInventario.show();
      }
  });

  //SELECT2
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
});
$(document).ready(function() {
  $('.select2').select2();
});


//FORMATO MONEDA
function formatNumber(input) {
  // Number formatting code
  let currencyFormat = new Intl.NumberFormat('es-MX', {
    style: 'currency',
    currency: 'MXN'
  });

  // Remove all characters except digits and decimal point
  let inputValue = input.value.replace(/[^\d.]/g, '');

  // Format the input value as currency
  let formattedValue = currencyFormat.format(inputValue);

  // Set the formatted value back into the input
  input.value = formattedValue;
}

//MÁSCARA DE TELÉFONO
function formatPhoneNumber(event) {
  // Obtener el valor actual del número telefónico
  let phoneNumber = event.target.value;

  // Eliminar cualquier caracter que no sea un dígito
  phoneNumber = phoneNumber.replace(/\D/g, '');

  // Formatear el número según el formato deseado (___)(__________)
  phoneNumber = phoneNumber.replace(/^(\d{3})(\d{0,8})/, '($1)($2)');

  // Asignar el número telefónico formateado de vuelta al input
  event.target.value = phoneNumber;
}

///////////////////////
//CÓDIGOS CON ESCANER//
///////////////////////
$(document).ready(function() {
    // Capturar el evento keypress en el input del código de barras
    $('#codigoBarrasInput').on('keypress', function(e) {
        // Si se presiona la tecla Enter
        if (e.which == 13) {
            e.preventDefault(); // Evitar el comportamiento por defecto de la tecla Enter
            return false; // No hacer nada más
        }
    });

    $('#editarCod').on('keypress', function(e) {
        // Si se presiona la tecla Enter
        if (e.which == 13) {
            e.preventDefault(); // Evitar el comportamiento por defecto de la tecla Enter
            return false; // No hacer nada más
        }
    });

    // Capturar el evento keypress en el input del código alterno
    $('#codigoAlternoInput').on('keypress', function(e) {
        // Si se presiona la tecla Enter
        if (e.which == 13) {
            e.preventDefault(); // Evitar el comportamiento por defecto de la tecla Enter
            return false; // No hacer nada más
        }
    });

    $('#editarCodAlterno').on('keypress', function(e) {
        // Si se presiona la tecla Enter
        if (e.which == 13) {
            e.preventDefault(); // Evitar el comportamiento por defecto de la tecla Enter
            return false; // No hacer nada más
        }
    });
});


///////////////
//DATATABLES //
///////////////

$(function() {
  bsCustomFileInput.init();
});

$(function() {
  $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "print": "Imprimir",
            "colvis": "Visibilidad"
        }
      }
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "print": "Imprimir",
            "colvis": "Visibilidad"
        }
      }
  });
});

/////////////////
//CÓDIGO POSTAL//
/////////////////
$(document).ready(function() {
    // Escucha el evento 'change' en la entrada del código postal
    $('input[name="nuevoCP"]').change(function() {
        // Obtiene el código postal que el usuario ingresó
        var codigoPostal = $(this).val();
        console.log(codigoPostal);

        // Envía una solicitud AJAX al servidor
        $.ajax({
            url: 'ajax/ajax.cp.php',  // Reemplaza esto con la ruta a tu script PHP
            method: 'POST',
            data: {
                cp: codigoPostal
            },
            success: function(response) {
                // Esto se ejecuta cuando la solicitud AJAX tiene éxito

                // Parsea la respuesta del servidor de JSON a un objeto JavaScript
                var data = JSON.parse(response);

                // Actualiza los campos del formulario con los datos del servidor
                $('input[name="nuevoEstado"]').val(data.estado);
                $('input[name="nuevaCiudad"]').val(data.municipio);
            }
        });
    });
});

///////////////////////
//FILTRAR EN LOS SELECT
///////////////////////

$(document).ready(function() {
    $('.js-data-example-ajax').select2({
        ajax: {
            url: 'ajax/ajax.filtrarSelect.php',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data.items
                };
            },
            cache: true
        },
        minimumInputLength: 1,
    });
});

//////////////////////////////////
//INPUTS DE OPCIONES DE PRODUCTO//
//////////////////////////////////

let contadorOpciones = 1;

$('#agregarOpcionBtn').click(function(e){
    e.preventDefault();
    
    let html = `
        <div class="col-md-6">
            <div class="opcion-input d-flex align-items-center">
                <label class="mr-2" style="width: 70px;">Opción ${contadorOpciones}:</label>
                <input type="text" class="form-control form-control-border" name="opcion${contadorOpciones}">
                <button class="eliminarOpcion btn btn-danger ml-2">X</button>
            </div>
        </div>
    `;
    
    $('#inputsContainer').append(html);
    contadorOpciones++;
});

$(document).on('click', '.eliminarOpcion', function(e){
    e.preventDefault();
    $(this).closest('.col-md-6').remove();
});

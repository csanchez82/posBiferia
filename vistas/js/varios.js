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

$(document).ready(function() {
  // Capturar el evento keypress en el input del código de barras
  $('#codigoBarrasInput').on('keypress', function(e) {
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
});

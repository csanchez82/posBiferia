//HACER TOOLTIPS
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
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

// Obtener elementos del DOM
var tipoSelect = document.querySelector('select[name="nuevoTipo"]');
var existenciaDecimalInput = document.querySelector('#existenciaDecimal');
var existenciaEnteraInput = document.querySelector('#existenciaEntera');
var minimoDecimalInput = document.querySelector('#minimoDecimal');
var minimoEnteraInput = document.querySelector('#minimoEntero');
var maximoDecimalInput = document.querySelector('#maximoDecimal');
var maximoEnteraInput = document.querySelector('#maximoEntero');

// Manejar cambio de tipo de artículo
tipoSelect.addEventListener('change', function() {
var tipo = tipoSelect.value;

if (tipo === 'Servicio') {
minimoDecimalInput.disabled = true;
minimoEnteraInput.disabled = true;
maximoDecimalInput.disabled = true;
maximoEnteraInput.disabled = true;
existenciaDecimalInput.disabled = true;
existenciaEnteraInput.disabled = true;
} else {
minimoDecimalInput.disabled = false;
minimoEnteraInput.disabled = false;
maximoDecimalInput.disabled = false;
maximoEnteraInput.disabled = false;
existenciaDecimalInput.disabled = false;
existenciaEnteraInput.disabled = false;
}

var existencia = parseFloat(existenciaDecimalInput.value) || parseInt(existenciaEnteraInput.value);

if (tipo === 'Artículo con decimales') {
existenciaDecimalInput.style.display = 'block';
existenciaEnteraInput.style.display = 'none';
existenciaDecimalInput.value = existencia.toFixed(2);
} else {
existenciaDecimalInput.style.display = 'none';
existenciaEnteraInput.style.display = 'block';
existenciaEnteraInput.value = Math.floor(existencia);
}
});

  //EVITAR QUE SALGA DE LA MODAL AL REGISTRAR LOS CÓDIGOS DE BARRAS
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
  
  
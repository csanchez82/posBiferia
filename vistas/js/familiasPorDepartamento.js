//Filtrar fams por departamentos
$(document).ready(function() {
    $('#departamentoSelect').change(function() {
        var departamentoId = $(this).val();
        
        // Limpiar el selector de familias si se seleccionó "Lista de departamentos"
        if (departamentoId === '') {
            $('#familiaSelect').html('<option value="">Lista de familias</option>');
            return;
        }
        
        $.ajax({
            url: 'ajax/ajax.obtenerFamilias.php', // Cambia esto a la ruta de tu script PHP
            type: 'GET',
            data: { departamento_id: departamentoId },
            success: function(response) {
                var familias = JSON.parse(response);
                var options = '';
                
                for (var i = 0; i < familias.length; i++) {
                    options += '<option value="' + familias[i].id + '">' + familias[i].familia + '</option>';
                }
                
                $('#familiaSelect').html(options);
            }
        });
    });
});

<?php
    // Incluye tus datos de conexión a la base de datos
    require_once '../modelos/conexion.php';

    // Crea la conexión a la base de datos
    $db = Conexion::conectar();

    // Obtiene el parámetro 'q' de la solicitud
    $q = $_REQUEST['q'] ?? '';

    // Realiza la consulta a la base de datos
    $query = "SELECT * FROM sat_claveprodserv WHERE descripcion LIKE '%$q%'";

    try {
        $result = $db->query($query);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Prepara un array para almacenar los resultados
    $items = array();

    // Si la consulta devolvió algún resultado
    if ($result->rowCount() > 0) {
        // Recorre los resultados y añade cada uno al array
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $items[] = array(
                'id' => $row['id'],
                'text' => $row['clave'] . '-' . $row['descripcion']
            );
        }
    }

    // Devuelve los resultados en formato JSON
    echo json_encode(array('items' => $items));
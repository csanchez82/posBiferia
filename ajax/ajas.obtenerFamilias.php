<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../modelos/familias.modelo.php';
require_once '../controladores/familiasPorDepartamentos.controlador.php';

if (!isset($_GET['departamento_id'])) {
    echo json_encode(['error' => 'No se proporcionó departamento_id']);
    exit;
}

$departamentoId = $_GET['departamento_id'];
$familias = ControladorFamiliasporDepartamentos::ctrMostrarFamiliasporDepartamentos($departamentoId);

echo json_encode($familias);
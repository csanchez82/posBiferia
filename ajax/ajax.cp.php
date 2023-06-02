<?php
require_once '../modelos/conexion.php';

// Obtiene el código postal del cliente
$codigoPostal = $_POST['cp'];

// Conecta a la base de datos
$conexion = new Conexion();
$db = $conexion->conectar();

// Busca los detalles del código postal en la base de datos
$query = "SELECT * FROM sat_codigoPostal WHERE codigoPostal = ?";
$stmt = $db->prepare($query);
$stmt->execute([$codigoPostal]);

// Devuelve los detalles del código postal al cliente
echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
<?php

require_once __DIR__ . "/config/database.php";
require_once __DIR__ . "/controlador/LibroController.php";
require_once __DIR__ . "/modelo/LibroDao.php";

// Inicializar conexión y controlador
$database = new Database();
$conexion = $database->conectar();

$dao = new LibroDao($conexion);
$controller = new LibroController($dao);

// Obtener la acción enviada por URL (por defecto 'index')
$accion = $_GET["accion"] ?? "index";

switch ($accion) {
    case "index":
        $controller->index();
        break;

    case "nuevo":
        $controller->nuevo();
        break;

    case "guardar":
        $controller->guardar();
        break;

    case "editar":
        $controller->editar();
        break;

    case "actualizar":
        $controller->actualizar();
        break;

    case "eliminar":
        $controller->eliminar();
        break;

    default:
        $controller->index();
        break;
}
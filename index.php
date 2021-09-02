<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
require_once 'helpers/utilidades.php';
require_once 'views/layaout/header.php';
require_once 'views/layaout/sidebar.php';

function ver_error() {
    $error = new errorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controller = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controller = controller_default;
} else {
    ver_error();
    exit();
}

if (class_exists($nombre_controller)) {

    $controlador = new $nombre_controller();

    //Optimizando el llamado de los controladores y acciones
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        ver_error();
    }
} else {
    ver_error();
}

require_once 'views/layaout/footer.php';
?>



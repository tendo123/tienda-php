<?php

function cargar_controllers($className) {
    include 'controllers/'.$className . '.php';
}

spl_autoload_register('cargar_controllers');

?>
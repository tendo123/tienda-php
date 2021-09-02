<?php

class Utilidades {

    public static function deleteSession($name) {

        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = NULL;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin() {

        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function isIdentity() {

        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function show_categorias() {

        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function statsCarrito() {
        //Creamos un array con esos indices y le damos un valor 0
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        // si cumple la condicion
        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $producto) {
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $stats;
    }

    public static function showStatus($status) {
        $value = "Pendiente";
        if ($status == "confirmar") {
            $value = "Pendiente";
        } elseif ($status == "proceso") {
            $value = "En proceso";
        } elseif ($status == "listo") {
            $value = "Listo";
        } elseif ($status == "enviado") {
            $value = "Enviado";
        }
        return $value;
    }

}

?>
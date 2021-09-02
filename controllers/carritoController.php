<?php

require_once 'models/producto.php';

class carritoController {

    public function index() {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
        } else {
            $carrito = array();
        }

        require_once 'views/carrito/index.php';
    }

    public function add() {
        //Recoger el id que nos llega por la URL
        if (isset($_GET['id'])) {
            //guardamos el id del producto 
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        //Validamos si existe la sesion del carrito sino se tiene q crear
        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            //$indicie = al indice del elemento  ejemplo : 0 , 1, 2 etc
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                //Validamos si el id del elemento es igual al id que nos llega por la URL
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    //Si esto sucede le aumentador un valor al contador
                    $contador++;
                }
            }
        }

        if (!isset($contador) || $contador == 0) {
            //Conseguir el producto
            $producto = new Producto();
            $producto->setId($producto_id);
            //Obtener 1 producto
            $prod = $producto->getOne();

            //Validamos el $prod para aññadir al carrito
            if (is_object($prod)) {
                //Añadimos - array
                $_SESSION['carrito'][] = array(
                    //Ojo se accede directo a las propiedades
                    "id_producto" => $prod->id,
                    "precio" => $prod->precio,
                    "unidades" => 1,
                    "producto" => $prod
                );
            }
        }
        header("Location:" . base_url . "carrito/index");
        ob_end_flush();
    }

    public function remove() {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            unset($_SESSION['carrito'][$indice]);
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function up() {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidades']++;
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function down() {
        if (isset($_GET['indice'])) {
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidades']--;
            if ($_SESSION['carrito'][$indice]['unidades'] == 0) {
                unset($_SESSION['carrito'][$indice]);
            }
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function deleteAll() {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
        ob_end_flush();
    }

}

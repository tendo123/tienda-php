<?php

require_once 'models/categoria.php';
// necesitamos el model de productor para cargarlos en la vista ver
require_once 'models/producto.php';

class categoriaController {

    public function index() {
        Utilidades::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver() {
        //Validamos si nos llega el id de la categoria
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            //Conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categ = $categoria->getOne();

            //Conseguir producto
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            
        }
        require_once 'views/categoria/ver.php';
    }

    public function save() {
        Utilidades::isAdmin();
        if ($_POST) {
            $nombre = $_POST['nombre'];
        }

        $categoria = new Categoria();
        $categoria->setNombre($nombre);
        $categoria->save();

        header("Location:" . base_url . "categoria/index");
    }

}

?>

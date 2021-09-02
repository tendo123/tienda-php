<?php

require_once 'models/producto.php';

class productoController {

    public function index() {
        $producto = new Producto();
        $productos = $producto->random(6);
        require_once 'views/producto/destacado.php';
    }

    public function ver() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            $pro = $producto->getOne();
            require_once 'views/producto/ver.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function gestion() {
        Utilidades::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function save() {
        Utilidades::isAdmin();
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                if (isset($_FILES['imagen'])) {
                    /* Insertar la imagen */
                    // recogemos los datos del archivo
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    // validamos si existe4 el tipo de imagen
                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
                        //si no existe el directorio 
                        if (!is_dir('uploads/images')) {
                            //crearlo
                            mkdir('uploads/images', 0777, true);
                        }

                        //usar el siguiente metodo para guardar el archivo enviando el temporal y la ubicacion y el nombredel aarchivo
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->update();
                } else {
                    $save = $producto->insert();
                }

                if ($save) {
                    $_SESSION['producto'] = "complet";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }

        header("Location:" . base_url . "producto/gestion");
    }

    public function editar() {
        Utilidades::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
            require_once 'views/producto/actualizar.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function eliminar() {
        Utilidades::isAdmin();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complet';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "producto/gestion");
    }

}

?>

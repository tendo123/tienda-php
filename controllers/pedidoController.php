<?php

require_once 'models/pedido.php';

class pedidoController {

    public function hacer() {
        require_once 'views/pedido/hacer.php';
    }

    public function add() {
        //Si esta iniciado sesion
        if (isset($_SESSION['identity'])) {
            //Recogemos los valores que nos llega por el formulario
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utilidades::statsCarrito();
            $coste = $stats['total'];
            if ($provincia && $distrito && $distrito) {
                //Gurdamos los datos
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setDistrito($distrito);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                //Guardar linea_pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = 'complete';
                } else {
                    $_SESSION['pedido'] = 'false';
                }
            } else {
                $_SESSION['pedido'] = 'false';
            }
            header("Location:" . base_url . "pedido/confirmar");
        } else {
            header("Location" . base_url);
        }
    }

    public function confirmar() {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            //seteamos el id de la sesion $identity
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getOneByUser();

            //ovtenemos los productos por el id del pedido
            $pedido_productos = new Pedido();
            //el id que le enviamos es el id que obtuvimos del metodo getOneByUser
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos() {
        Utilidades::isIdentity();
        $usuario_id = $_SESSION['identity']->id;
        $pedido = new Pedido();

        //Sacar los pedidos por el id del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle() {
        Utilidades::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //Sacar los productos
            $lineas_pedidos = new Pedido();
            $productos = $lineas_pedidos->getProductosByPedido($pedido->id);

            require_once 'views/pedido/detalle.php';
        } else {
            header("Location:" . base_url . "pedido/mis_pedidos");
        }
    }

    public function gestion() {
        Utilidades::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado() {
        Utilidades::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            //Recogemos el id que nos llega por POST
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedido = new Pedido();
            //Seteamos los valores que nos llega del formularioi
            $pedido->setId($id);
            $pedido->setEstado($estado);
            //Usamos el metodo para editar el estado
            $pedido = $pedido->edit();
            //Redireccionamiento enviando el id editado
            header("Location:".base_url."pedido/detalle&id=$id");
        } else {
            header("Location:" . base_url);
        }
    }

}

?>

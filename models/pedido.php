<?php

class Pedido {

    private $id;
    private $usuario_id;
    private $provincia;
    private $distrito;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id): void {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    function setDistrito($distrito): void {
        $this->distrito = $distrito;
    }

    function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    function setCoste($coste): void {
        $this->coste = $coste;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    function setHora($hora): void {
        $this->hora = $hora;
    }

    public function getAll() {
        $pedidos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $pedidos;
    }

    public function getAllByUser() {
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
        $pedidos = $this->db->query($sql);
        return $pedidos;
    }

    //fetch_objetc para devolver 1 solo objeto no funciona en una consulta que devuelve varios objetos o registros
    public function getOne() {
        $pedido = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $pedido->fetch_object();
    }

    public function getOneByUser() {
        $sql = "SELECT id, coste FROM pedidos WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    //Subconsulta para obtener todos los productos de lineas_pedidos por id que le enviamos
    public function getProductosByPedido($id) {
        // $sql = "SELECT * FROM productos WHERE id in(SELECT producto_id FROM lineas_pedidos WHERE pedido_id = {$id})";
        //Consulta para obtener las unidades 
        $sql = "SELECT p.*, lp.unidades FROM productos p INNER JOIN lineas_pedidos lp ON p.id = lp.producto_id WHERE lp.pedido_id = {$id}";

        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save() {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getProvincia()}', '{$this->getDistrito()}', '{$this->getDireccion()}',{$this->getCoste()},'CONFIRMADO', CURDATE(), CURTIME())";
        $save = $this->db->query($sql);
        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_linea() {
        //Obtener el el id del ultimo registro guardado
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        //necesitamos el producto y las unidades asi q recorremos el carrito
        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            //Insertar en la linea_pedido el registro
            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            //Ejectuamos la sentencia sql
            $save = $this->db->query($insert);
        }
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function edit() {
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}'";
        $sql .= "WHERE id = {$this->getId()}";

        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

}
?>


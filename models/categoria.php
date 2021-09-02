<?php

class Categoria {

    private $id;
    private $nombre;
    private $db;

    function __construct() {
        $this->db = Database::conectar();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNombre($nombre): void {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll() {
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function getOne() {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $categoria = $this->db->query($sql);
        return $categoria->fetch_object();
    }

    public function save() {
        $sql = "INSERT INTO categorias VALUES(null,'{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

}

?>
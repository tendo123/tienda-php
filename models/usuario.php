<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
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

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getDb() {
        return $this->db;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNombre($nombre): void {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email): void {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setRol($rol): void {
        $this->rol = $rol;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    function setDb($db): void {
        $this->db = $db;
    }

    public function save() {
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}','user',NULL);";
        $save = $this->db->query($sql);
        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function login() {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        //Obtener el registro si el email es igual
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        //Si existe el login y el numero de filas es igual a 1
        if ($login && $login->num_rows == 1) {
            //Guardamos el objeto de la BD en la variable $usuario
            $usuario = $login->fetch_object();

            //$password ->es la password que nos llega por el formulario.
            //$hash -> es la password que se encuentra en la BD.
            $verify = password_verify($password, $usuario->password);

            //Validamos si existe $verify devolvemos el objeto de la BD
            if ($verify) {
                $result = $usuario;
            }
        }

        return $result;
    }

}

?>
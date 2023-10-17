<?php


class userModel {
    private $PDO;

    public function __construct()
    {
        require_once('/xampp/htdocs/criptonoticias/config/config.php');
        $conex = new db();
        $this->PDO = $conex->conexion();
    }

    public function newUser($nombre, $apellido, $email, $contraseña){
        $statement = $this->PDO->prepare("INSERT INTO usuarios (nombre, apellido, email, contraseña, rol) VALUES ('$nombre','$apellido', '$email', '$contraseña', 'usuario')");

        return ($statement->execute()) ? true : false;
    }

    public function getUserById($id){
        $statement = $this->PDO->prepare("SELECT * FROM usuarios WHERE id = ?");

        return ($statement->execute([$id])) ? $statement->fetch() : false;
    }

    public function getUserByName($name){
        $statement = $this->PDO->prepare("SELECT * FROM usuarios WHERE nombre = ?");

        return ($statement->execute([$name])) ? $statement->fetch() : false;
    }

    public function deleteUser($id){
        $statement = $this->PDO->prepare("DELETE FROM usuarios WHERE id = ?");

        return ($statement->execute([$id])) ? true : false;
    }


}
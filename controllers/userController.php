<?php

class userController {
    private $model;
    private $view;

    public function __construct(){
        require_once('C:\xampp\htdocs\CriptoNoticias\models\userModel.php');
        require_once('C:\xampp\htdocs\CriptoNoticias\views\userView.php');
        $this->model = new userModel();
        $this->view = new userView();
    }

    // Revisamos que el metodo sea post, y que no haya campos vacios.
    public function newUser(){
        if($_SERVER['REQUEST_METHOD'] === "POST" 
            && !empty($_POST['nombre']) 
            && !empty($_POST['apellido']) 
            && !empty($_POST['email']) 
            && !empty($_POST['contraseña']))
            
        {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];

            if($this->model->getUserByEmail($email)){
                $this->view->showAlert("Ya existe un usuario registrado", "error");
                die();
            }// Si el email ingresado pertenece a otra cuenta devolvemos esta alerta.

            $hashed = md5($contraseña); // Protegemos la contraseña, crea un string random que reemplaza la contraseña.
            if ($this->model->newUser($nombre, $apellido, $email, $hashed)) {
                $_SESSION['email'] = $email; // En la session almacenamos el email y luego el rol.
                $userFound = $this->model->getUserByEmail($email); // Traemos al usuario para ver que rol tiene.
                $_SESSION['rol'] = $userFound['rol'];

                header("Location: inicio"); // Devolvemos al inicio.
            } else {
                $this->view->showAlert("No se pudo registrar el usuario", "error");
            }
        } else {
            $this->view->showAlert("Completa los campos obligatorios", "error");
        }
    }

    public function loginUser(){
        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['email']) && !empty($_POST['contraseña'])){
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            $userFound = $this->model->getUserByEmail($email);

            // Si el usuario no se encuentra, devolvemos una alerta.
            if(!$userFound) return $this->view->showAlert("No existe este usuario", "error");

            if(md5($contraseña) === $userFound['contraseña']){ // Comparamos la contraseña hasheada guardada y el hash de la nueva.
                $_SESSION['email'] = $email;
                $_SESSION['rol'] = $userFound['rol'];
                header("Location: inicio");
            } else {
                $this->view->showAlert("Contraseña incorrecta", "error");
            }
        }
    }

    public function close(){
        session_destroy(); // Cerramos la sesion y devolvemos al inicio.
        header("Location: inicio");
    }

    public function renderLoginForm(){
        $this->view->renderLoginForm();
    }

    public function renderRegisterForm(){
        $this->view->renderRegisterForm();
    }

    public function renderCrearNoticias(){
        require_once('C:\xampp\htdocs\CriptoNoticias\models\seccionesModel.php');
        $secciones = seccionesModel::getSecciones(); // No instanciamos ya que es un metodo estatico
        $this->view->renderCrearNoticias($secciones);
    }

}
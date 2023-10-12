<?php

class userController {
    private $model;
    private $view;
    private $alert;

    public function __construct(){
        require_once('C:\xampp\htdocs\CriptoNoticias\models\userModel.php');
        require_once('C:\xampp\htdocs\CriptoNoticias\views\userView.php');
        require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');
        $this->model = new userModel();
        $this->view = new userView();
        $this->alert = new helperError();
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
                require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');
                $this->alert->showAlert("Contraseña Incorrecta", "danger");
                die();
            }// Si el email ingresado pertenece a otra cuenta devolvemos esta alerta.

            $hashed = password_hash($contraseña, PASSWORD_BCRYPT); // Protegemos la contraseña, crea un string random que reemplaza la contraseña.
            if ($this->model->newUser($nombre, $apellido, $email, $hashed)) {
                $_SESSION['email'] = $email; // En la session almacenamos el email y luego el rol.
                $userFound = $this->model->getUserByEmail($email); // Traemos al usuario para ver que rol tiene.
                $_SESSION['rol'] = $userFound['rol'];

                header("Location: inicio"); // Devolvemos al inicio.
            } else {
                $this->alert->showAlert("No se pudo crear el usuario", "danger");
                die();
            }
        } else {
            $this->alert->showAlert("Enviaste datos vacios", "danger");
            die();
        }
    }

    public function loginUser(){
        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['email']) && !empty($_POST['contraseña'])){
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            $userFound = $this->model->getUserByEmail($email);

            // Si el usuario no se encuentra, devolvemos una alerta.
            if(!$userFound) {
                require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');
                $this->alert->showAlert("Este usuario no existe", "danger");
                die();
            }

            $contraseniaEncontrada = $userFound['contraseña'];

            if(password_verify($contraseña, $contraseniaEncontrada)){ // Comparamos la contraseña hasheada guardada y el hash de la nueva.
                $_SESSION['email'] = $email;
                $_SESSION['rol'] = $userFound['rol'];
                header("Location: inicio");
            } else {
                require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');
                $this->alert->showAlert("Contraseña Incorrecta", "danger");
                die();
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
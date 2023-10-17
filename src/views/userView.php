<?php


class userView {
    // Este metodo sirve para cargar funciones de exito o de error

    public function renderLoginForm(){
        include_once 'src/templates/login.phtml';
    }

    
    public function renderRegisterForm(){
        include_once 'src/templates/registro.phtml';
    }


}
<?php


class userView {
    // Este metodo sirve para cargar funciones de exito o de error

    public function renderLoginForm(){
        require('/xampp/htdocs/criptonoticias/templates/login.phtml');
    }

    
    public function renderRegisterForm(){
        require('/xampp/htdocs/criptonoticias/templates/registro.phtml');
    }


}
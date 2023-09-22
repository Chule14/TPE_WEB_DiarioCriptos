<?php 


class noticiasController {
    private $model;
    private $view;

    // El constructor es la funcion ejecutada al instaciar un objeto de clase controlador.
    // Le asigna a las variables model y view un objeto de clase noticiasModel y noticiasView respectivamente.
    public function __construct () {
        require_once('C:\xampp\htdocs\CriptoNoticias\models\noticiasModel.php');
        require_once('C:\xampp\htdocs\CriptoNoticias\views\noticiasView.php');
        $this->model = new noticiasModel();
        $this->view = new noticiasViews();
    }

    // Este metodo muestra los resultados encontrados en la bd a travez de la vista
    public function showNoticias () {
        $noticias = $this->model->getNoticias(); 
        $this->view->showNoticias($noticias);
    }

    // Es similar al anterior pero muestra un resultado unico.
    public function showNoticia ($id) {
        $noticia = $this->model->getNoticia($id); 
        $this->view->showNoticia($noticia);
    }
}









?>
<?php 


class seccionesController {
    private $model;
    private $view;
    private $alert;

    // El constructor es la funcion ejecutada al instaciar un objeto de clase controlador.
    // Le asigna a las variables model y view un objeto de clase noticiasModel y noticiasView respectivamente.
    public function __construct () {
        include_once 'src/models/seccionesModel.php';
        include_once 'src/views/seccionesView.php';
        include_once 'src/helper/errorHelper.php';
        $this->model = new seccionesModel();
        $this->view = new seccionesViews();
        $this->alert = new helperError();
    }

    
    public function renderAdministrarSecciones(){
        $secciones = $this->model->getSecciones();
        $this->view->renderAdministrarSecciones($secciones);
    }

    public function renderCrearSeccion(){
        $this->view->renderCrearSeccion();
    }

    public function renderEditarSeccion($id){
        $this->view->renderEditarSeccion($id);
    }

    public function deleteSeccion ($id) {
        $noticia = $this->model->deleteSeccion($id); 
        if(!$noticia) return $this->alert->showAlert('No se pudo eliminar esta seccion', 'danger');
        header("Location: http://".$_SERVER["SERVER_NAME"] . "/criptonoticias/secciones");
    }

    public function updateSeccion ($id) {
        $tipo = $_POST['tipo'];

        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($tipo)){
            $updated = $this->model->updateSeccion($id, $tipo); 
            if(!$updated) return $this->alert->showAlert('No se pudo actualizar esta seccion', 'danger');
            header("Location: http://".$_SERVER["SERVER_NAME"] . "/criptonoticias/secciones");
        }
    }

    public function newSeccion () {
        $tipo = $_POST['tipo'];

        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($tipo)){
            $new = $this->model->createSeccion($tipo); 
            if(!$new) return $this->alert->showAlert('No se pudo crear esta seccion', 'danger');
            header("Location: http://".$_SERVER["SERVER_NAME"] . "/criptonoticias/secciones");
        }
    }
   
   
   
}









?>
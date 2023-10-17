<?php 


class noticiasController {
    private $model;
    private $view;
    private $alert;
    private $secciones;

    // El constructor es la funcion ejecutada al instaciar un objeto de clase controlador.
    // Le asigna a las variables model y view un objeto de clase noticiasModel y noticiasView respectivamente.
    public function __construct () {
        require_once('C:\xampp\htdocs\CriptoNoticias\models\noticiasModel.php');
        require_once('C:\xampp\htdocs\CriptoNoticias\views\noticiasView.php');
        require_once('C:\xampp\htdocs\CriptoNoticias\models\seccionesModel.php');
        require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');
        $this->model = new noticiasModel();
        $this->view = new noticiasViews();
        $this->secciones = new seccionesModel();
        $this->alert = new helperError();
    }

    // Este metodo muestra los resultados encontrados en la bd a travez de la vista
    public function showNoticias () {
        $noticias = $this->model->getNoticias(); 
        if(!$noticias) return $this->alert->showAlert('No hay noticias para mostrar', 'danger');
        
        $secciones = $this->secciones->getSecciones();
        $this->view->showNoticias($noticias, $secciones);
    }

    // Es similar al anterior pero muestra un resultado unico.
    public function showNoticia ($id) {
        $noticia = $this->model->getNoticia($id); 
        if(!$noticia) return $this->alert->showAlert('No hay noticia para mostrar', 'danger');
        $this->view->showNoticia($noticia);
    }

    // Es similar al anterior pero muestra un resultado unico.
    public function deleteNoticia ($id) {
        $noticia = $this->model->deleteNoticia($id); 
        if(!$noticia) return $this->alert->showAlert('No se pudo eliminar esta noticia', 'danger');
        header("Location: http://".$_SERVER["SERVER_NAME"] . "/criptonoticias/noticias");
    }

    
    public function renderFiltrado(){
        if($_SERVER['REQUEST_METHOD'] === "GET" 
            && !empty($_GET['seccion']))
        {
            $id = $_GET['seccion'];
            $noticias = $this->model->filtrarNoticias($id);

            if(!$noticias) return $this->alert->showAlert('No hay noticias de esta categoria', 'danger');
                
            $secciones = $this->secciones->getSecciones();
            $this->view->showNoticias($noticias, $secciones);
        }
    }

    public function newNoticia(){
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descripcion = $_POST['descripcion'];
        $seccion = $_POST['seccion'];
        $imagen = $_FILES['imagen'];


        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($titulo) && !empty($subtitulo) && !empty($seccion) && !empty($descripcion) && !empty($imagen)){
            
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uploadOk = 1;

            // Verificar si el archivo es una imagen real
            $check = getimagesize($_FILES["imagen"]["tmp_name"]);
            if($check === false) {
                $uploadOk = 0;
                return $this->alert->showAlert('Debes subir una imagen', 'danger');
            }


            // Permitir ciertos formatos de archivo (puedes agregar más según tus necesidades)
            $allowed_formats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_formats)) {
                $uploadOk = 0;
                return $this->alert->showAlert('Solo se permiten archivos JPG, PNG, GIF', 'error');
            }

            // Intentar subir el archivo si no hubo errores
            if ($uploadOk == 1) {
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
            }

            $newNoticia = $this->model->newNoticia($titulo, $subtitulo, $descripcion, $seccion, $target_file);

            if($newNoticia){
                return $this->alert->showAlert('Noticia creada con exito', 'success');
            } else {
                return $this->alert->showAlert('No se pudo crear la noticia', 'danger');
            }
        } else {
            return $this->alert->showAlert('No se puede crear la noticia, campos vacios', 'danger');
        }
    }


    public function updateNoticia($id){
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descripcion = $_POST['descripcion'];
        $seccion = $_POST['seccion'];


        if($_SERVER['REQUEST_METHOD'] === "POST" && !empty($titulo) && !empty($subtitulo) && !empty($seccion) && !empty($descripcion)){
             $updated = $this->model->updateNoticia($id, $titulo, $subtitulo, $descripcion, $seccion);

            if($updated){
                header("Location: http://".$_SERVER["SERVER_NAME"] . "/criptonoticias/noticias");
            } else {
                return $this->alert->showAlert('No se pudo actualizar la noticia', 'danger');
            }
        } else {
            return $this->alert->showAlert('No se puede actualizar la noticia, campos vacios', 'danger');
        }
    }

    public function renderAdministrarNoticias(){
        $noticias = $this->model->getNoticias();
        $this->view->renderAdministrarNoticias($noticias);
    }
    
    public function renderEditarNoticia($id){
        $secciones = $this->secciones->getSecciones();
        $this->view->renderEditarNoticia($secciones, $id);
    }

    public function renderCrearNoticia(){
        $secciones = $this->secciones->getSecciones();
        $this->view->renderCrearNoticia($secciones);
    }
}









?>
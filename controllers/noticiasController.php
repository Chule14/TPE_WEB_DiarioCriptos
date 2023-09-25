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
        if(!$noticias) return $this->view->showAlert('No hay noticias para mostrar', 'error');
        $this->view->showNoticias($noticias);
    }

    // Es similar al anterior pero muestra un resultado unico.
    public function showNoticia ($id) {
        $noticia = $this->model->getNoticia($id); 
        if(!$noticia) return $this->view->showAlert('No hay noticia para mostrar', 'error');
        $this->view->showNoticia($noticia);
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
                return $this->view->showAlert('Debes subir una imagen', 'error');
            }


            // Permitir ciertos formatos de archivo (puedes agregar más según tus necesidades)
            $allowed_formats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_formats)) {
                $uploadOk = 0;
                return $this->view->showAlert('Solo se permiten archivos JPG, PNG, GIF', 'error');
            }

            // Intentar subir el archivo si no hubo errores
            if ($uploadOk == 1) return move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

            $newNoticia = $this->model->newNoticia($titulo, $subtitulo, $descripcion, $seccion, $target_file);

            if($newNoticia){
                return $this->view->showAlert('Noticia creada con exito', 'success');
            } else {
                return $this->view->showAlert('No se pudo crear la noticia', 'error');
            }
        } else {
            return $this->view->showAlert('No se puede crear la noticia, campos vacios', 'error');
        }
    }
}









?>
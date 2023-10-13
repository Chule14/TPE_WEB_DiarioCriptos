<?php 


class noticiasController {
    private $model;
    private $view;
    private $alert;

    // El constructor es la funcion ejecutada al instaciar un objeto de clase controlador.
    // Le asigna a las variables model y view un objeto de clase noticiasModel y noticiasView respectivamente.
    public function __construct () {
        require_once('C:\xampp\htdocs\CriptoNoticias\models\noticiasModel.php');
        require_once('C:\xampp\htdocs\CriptoNoticias\views\noticiasView.php');
        require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');
        $this->model = new noticiasModel();
        $this->view = new noticiasViews();
        $this->alert = new helperError();
    }

    // Este metodo muestra los resultados encontrados en la bd a travez de la vista
    public function showNoticias () {
        $noticias = $this->model->getNoticias(); 
<<<<<<< HEAD
        if(!$noticias) return $this->alert->showAlert('No hay noticias para mostrar', 'danger');
        require_once('C:\xampp\htdocs\CriptoNoticias\models\seccionesModel.php');
        $secciones = seccionesModel::getSecciones();
        $this->view->showNoticias($noticias, $secciones);
=======
        if(!$noticias) return $this->view->showAlert('No hay noticias para mostrar', 'error');
        $this->view->showNoticias($noticias);
>>>>>>> b9cf47e60db9209855a85ed675667503a77343e2
    }

    // Es similar al anterior pero muestra un resultado unico.
    public function showNoticia ($id) {
        $noticia = $this->model->getNoticia($id); 
<<<<<<< HEAD
        if(!$noticia) return $this->alert->showAlert('No hay noticia para mostrar', 'danger');
        $this->view->showNoticia($noticia);
    }

    
    public function renderFiltrado(){
        if($_SERVER['REQUEST_METHOD'] === "GET" 
            && !empty($_GET['seccion']))
        {
            $id = $_GET['seccion'];
            $noticias = $this->model->filtrarNoticias($id);

            if(!$noticias) return $this->alert->showAlert('No hay noticias de esta categoria', 'danger');
                
            require_once('C:\xampp\htdocs\CriptoNoticias\models\seccionesModel.php');
            $secciones = seccionesModel::getSecciones();
            $this->view->showNoticias($noticias, $secciones);
        }
    }

=======
        if(!$noticia) return $this->view->showAlert('No hay noticia para mostrar', 'error');
        $this->view->showNoticia($noticia);
    }

>>>>>>> b9cf47e60db9209855a85ed675667503a77343e2
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
<<<<<<< HEAD
                return $this->alert->showAlert('Debes subir una imagen', 'danger');
=======
                return $this->view->showAlert('Debes subir una imagen', 'error');
>>>>>>> b9cf47e60db9209855a85ed675667503a77343e2
            }


            // Permitir ciertos formatos de archivo (puedes agregar más según tus necesidades)
            $allowed_formats = array("jpg", "jpeg", "png", "gif");
            if (!in_array($imageFileType, $allowed_formats)) {
                $uploadOk = 0;
<<<<<<< HEAD
                return $this->alert->showAlert('Solo se permiten archivos JPG, PNG, GIF', 'error');
            }

            // Intentar subir el archivo si no hubo errores
            if ($uploadOk == 1) {
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
            }
=======
                return $this->view->showAlert('Solo se permiten archivos JPG, PNG, GIF', 'error');
            }

            // Intentar subir el archivo si no hubo errores
            if ($uploadOk == 1) move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
>>>>>>> b9cf47e60db9209855a85ed675667503a77343e2

            $newNoticia = $this->model->newNoticia($titulo, $subtitulo, $descripcion, $seccion, $target_file);

            if($newNoticia){
<<<<<<< HEAD
                return $this->alert->showAlert('Noticia creada con exito', 'success');
            } else {
                return $this->alert->showAlert('No se pudo crear la noticia', 'danger');
            }
        } else {
            return $this->alert->showAlert('No se puede crear la noticia, campos vacios', 'danger');
=======
                return $this->view->showAlert('Noticia creada con exito', 'success');
            } else {
                return $this->view->showAlert('No se pudo crear la noticia', 'error');
            }
        } else {
            return $this->view->showAlert('No se puede crear la noticia, campos vacios', 'error');
>>>>>>> b9cf47e60db9209855a85ed675667503a77343e2
        }
    }
}









?>
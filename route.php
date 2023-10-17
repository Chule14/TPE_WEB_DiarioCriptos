<?php
// Iniciamos Session, ya que el route es la primera "pagina" visitada al entrar.
session_start();



// IMPORTAMOS CONTROLADORES
require_once('/xampp/htdocs/criptonoticias/controllers/noticiasController.php');
require_once('/xampp/htdocs/criptonoticias/controllers/userController.php');
require_once('/xampp/htdocs/criptonoticias/controllers/seccionesController.php');
require_once('/xampp/htdocs/criptonoticias/helper/errorHelper.php');

// Instanciamos controlador de noticias
$noticiasController = new noticiasController();
$userController = new userController();
$seccionesController = new seccionesController();
$helper = new helperError();


// leemos la accion que viene por parametro
$action = 'inicio'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'inicio':
        $noticiasController->showNoticias(); // Accedemos al metodo showNoticias.
        break;
    case 'noticia':
        $id = null;
        if (isset($params[1])) $id = $params[1];
        $noticiasController->showNoticia($id);
        break;
    case 'filtrar':
        $noticiasController->renderFiltrado();
        break; 

    // Aqui estan las rutas referidas a las sesiones  y registros.
    case 'ingresar':
        if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que accedan a una sesion con una sesion ya iniciada.
        $userController->renderLoginForm();
        break;
    case 'iniciar': // Aqui es donde el formulario envia los datos de sesion
        $userController->loginUser();
        break;
    case 'registrarse':
        if (isset($_SESSION['rol'])) header("Location: inicio"); // Esto previene que creen un usuario desde una sesion iniciada
        $userController->renderRegisterForm();
        break;
    case 'registrar': // Aqui el formulario envia los datos de registro.
        $userController->newUser();
        break;
    case 'cerrar':
        $userController->close();
        break;
   
    // Enrutado de Noticias

    case 'noticias':
        // Si no tiene rol admin, deniega acceso.
        if ($_SESSION['rol'] !== 'admin') header("Location: inicio");
        if (isset($params[1])) {
            if(isset($params[2])) $id = $params[2]; // Pregunta si hay parametro 2 y lo guarda.
            if($params[1] === 'crear') $noticiasController->renderCrearNoticia();
            if($params[1] === 'nueva') $noticiasController->newNoticia();
            if($params[1] === 'editar') $noticiasController->renderEditarNoticia($id);
            if($params[1] === 'actualizar') $noticiasController->updateNoticia($id);
            if($params[1] === 'eliminar') $noticiasController->deleteNoticia($id);
        } else 
        // Si no encuentra parametro 1, renderiza la pagina de administrar noticias.
            $noticiasController->renderAdministrarNoticias();
        break;

    // Enrutado de seccionado
    case 'secciones':
        if ($_SESSION['rol'] !== 'admin') header("Location: inicio");
        if (isset($params[1])) {
            if(isset($params[2])) $id = $params[2]; // Pregunta si hay parametro 2 y lo guarda.
            if($params[1] === 'crear') $seccionesController->renderCrearSeccion();
            if($params[1] === 'nueva') $seccionesController->newSeccion();
            if($params[1] === 'editar') $seccionesController->renderEditarSeccion($id);
            if($params[1] === 'actualizar') $seccionesController->updateSeccion($id);
            if($params[1] === 'eliminar') $seccionesController->deleteSeccion($id);
        } else 
        // Si no encuentra parametro 1, renderiza la pagina de administrar noticias.
            $seccionesController->renderAdministrarSecciones();
        break;

    default:
    //Si no encuentra la URL o no tiene ruta y controlador definido muestra error.
        $helper->showAlert("Esta pagina no existe", "danger");
}

// Cargamos el footer, contenido estatico.

<?php

session_start();

// Cargamos el Header y Navbar, son contenidos estaticos.


// IMPORTAMOS CONTROLADORES
require_once('/xampp/htdocs/criptonoticias/controllers/noticiasController.php');
require_once('/xampp/htdocs/criptonoticias/controllers/userController.php');

// Instanciamos controlador de noticias
$noticiasController = new noticiasController();
$userController = new userController();


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
    case 'ingresar':
        if (isset($_SESSION['rol'])) break; // Esto previene que accedan a una sesion con una sesion ya iniciada.
        $userController->renderLoginForm();
        break;
    case 'iniciar': // Aqui es donde el formulario envia los datos de sesion
        $userController->loginUser();
        break;
    case 'registrarse':
        if (isset($_SESSION['rol'])) break; // Esto previene que creen un usuario desde una sesion iniciada
        $userController->renderRegisterForm();
        break;
    case 'registrar': // Aqui el formulario envia los datos de registro.
        $userController->newUser();
        break;
    case 'cerrar':
        $userController->close();
        break;
    case 'filtrar':
        $noticiasController->renderFiltrado();
        break;
    case 'crear':
        if($_SESSION['rol'] !== 'admin') break;
        $userController->renderCrearNoticias();
        break;
    case 'nueva':
        if($_SESSION['rol'] !== 'admin') break;
        $noticiasController->newNoticia();
        break;
    default:
        echo 'Error';
}

// Cargamos el footer, contenido estatico.
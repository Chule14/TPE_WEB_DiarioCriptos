<?php

session_start();

// Pregunta si en la session esta seteado el rol en el array.
if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 'usuario'){ // Si el rol es usuario muestra la navbar de usuario.
        require_once('C:\xampp\htdocs\CriptoNoticias\components\head\userhead.php');
    } else if($_SESSION['rol'] == 'admin') { // Si es admin muestra el nav de admin.
        require_once('C:\xampp\htdocs\CriptoNoticias\components\head\adminhead.php');
    }
} else {
    // Si no hay sesión definida, muestra el menú de invitado.
    require_once('C:\xampp\htdocs\CriptoNoticias\components\head\head.php');
}
// Cargamos el Header y Navbar, son contenidos estaticos.


// IMPORTAMOS CONTROLADORES
require_once('C:\xampp\htdocs\CriptoNoticias\controllers\noticiasController.php');
require_once('C:\xampp\htdocs\CriptoNoticias\controllers\userController.php');

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
    case 'crear':
        if($_SESSION['rol'] !== 'admin') break;
        $userController->renderCrearNoticias();
        break;
    case 'nueva':
        if($_SESSION['rol'] !== 'admin') break;
        $noticiasController->newNoticia();
        break;
    default:
        showError();
        break;
}

// Funcion de error por si sale mal la consulta al router.
function showError()
{
    echo('
    <div class="container">
        <div class="error">
            <img src="images/error.png">
            <div>
                <h1 class="fs-2">404</h1>
                <h2 class="fs-6">Página no encontrada</h2>
            </div>
        </div>
    </div>
    ');
}

// Cargamos el footer, contenido estatico.
require_once('C:\xampp\htdocs\CriptoNoticias\components\foot\foot.php');
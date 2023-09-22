<?php
// Cargamos el Header y Navbar, son contenidos estaticos.
require_once('C:\xampp\htdocs\CriptoNoticias\components\head\head.php');




require_once('C:\xampp\htdocs\CriptoNoticias\controllers\noticiasController.php');

// Instanciamos controlador de noticias
$controller = new noticiasController();


// leemos la accion que viene por parametro
$action = 'home'; // acción por defecto

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller->showNoticias(); // Accedemos al metodo showNoticias.
        break;
    case 'noticia':
        $id = null;
        if (isset($params[1])) $id = $params[1];
        $controller->showNoticia($id);
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
        <div class="row">
            <div class="col-12 text-center">
                <h1>404</h1>
                <h2>Página no encontrada</h2>
            </div>
        </div>
    </div>
    ');
}

// Cargamos el footer, contenido estatico.
require_once('C:\xampp\htdocs\CriptoNoticias\components\head\foot.php');

<?php

session_start();
require_once 'autoload.php';
require_once 'config/db.php';
//aqui se almacena el controller default
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function show_error()
{
    $error = new ErrorController();
    $error->index();
}
    
//$producto = new ProductoController();
/*
$producto->mostrarTodos();
$producto->crear();
*/

//var_dump($_GET);
if(isset($_GET['controller']))
{
    $nombre_controlador = $_GET['controller'];
}
elseif(!isset($_GET['controller']) && !isset($_GET["action"]))
{
    //definida en parameters
    $nombre_controlador = controller_default;
}
else
{
    show_error();
    exit();
}

/**
 * se comprueba que la clase seleccionada y el metodo existan
 */
if(class_exists($nombre_controlador))
{
    //se obtiene el nombre del controlador y define un objeto
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action']))
    {
        //se ejecuta un metodo para el objeto de controlador
        $action = $_GET['action'];
        $controlador->$action();
    }
    elseif(!isset($_GET['action']) || empty($_GET["action"]))
    {
        $action_default = action_default;
        $controlador->$action_default();
    }
    else
    {
        show_error();
    }

}
else
{
    show_error();
    //echo "<h3>el controlador/clase que buscas no existe</h3>";
}

require_once 'views/layout/footer.php';

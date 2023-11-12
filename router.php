<?php

require_once './api/ProductApiController.php';

define("URL_PRODUCT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/api/productos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');


$productosApiController = new ProductApiController();
$action = 'login'; 

if (!empty($_GET['action'])) { 
    $action = $_GET['action'];
}


$params = explode('/', $action);


switch ($params[0]) {
    // case 'index':
    //     $productosController->getIndex();
    //     break;
    case 'login':
        $productosApiController->showLogin();
        break;        
    case 'iniciar':
        $productosApiController->loginIn();
        break;                           
    default:
        break;
}
?>
<?php
require_once './libs/Route.php';
require_once './api/controllers/ProductApiController.php';
// require_once './api/AuthApiController.php';

define("URL_PRODUCT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/productos');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');


$router = new Router();

// define la tabla de ruteo
$router->addRoute('/productos', 'GET', 'ProductApiController', 'obtenerProductos');
$router->addRoute('/productos/:ID', 'GET', 'ProductApiController', 'obtenerProductos');
$router->addRoute('/productos/:ID', 'PUT', 'ProductApiController', 'modificarProducto');
$router->addRoute('/productos', 'POST', 'ProductApiController', 'agregarProducto');
$router->addRoute('/productos/categoria/:CATEGORY', 'GET', 'ProductApiController', 'obtenerProductosPorCategoria');



// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>
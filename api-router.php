<?php
require_once 'Route.php';
require_once './api/ProductApiController.php';


define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$router = new Router();

// define la tabla de ruteo
$router->addRoute('/productos', 'GET', 'ProductApiController', 'obtenerProductos');
$router->addRoute('/productos/:ID', 'GET', 'ProductApiController', 'obtenerProductos');
$router->addRoute('/productos/:ID', 'PUT', 'ProductApiController', 'modificarProducto');
$router->addRoute('/productos', 'POST', 'ProductApiController', 'agregarProducto');
$router->addRoute('/productos/categoria/:CATEGORY', 'GET', 'ProductApiController', 'obtenerProductosPorCategoria');
$router->addRoute('/productos/:ELEMENTO/:ORDER', 'GET', 'ProductApiController', 'ordenarProduct');




// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);

?>
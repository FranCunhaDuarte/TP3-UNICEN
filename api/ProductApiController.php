<?php
require_once './Model/ProductModel.php';
require_once './api/ApiController.php';
require_once './Model/CategoriesModel.php';
require_once './Model/UserModel.php';
require_once './helper/UserHelper.php';
require_once './api/jsonView.php';

class ProductApiController extends ApiController {

    public function __construct() {
        parent::__construct();
        $this->model = new ProductModel();
        $this->modelCategory = new CategoriesModel();
        $this->modelUser = new UserModel();
    }

    public function obtenerProductos($params = []) {
        if(empty($params)){
            $products = $this->model->getProducts();
            return $this->view->response($products, 200);
        }else {
            $id = $params[':ID'];
            $product = $this->model->getProduct($id);
            if(!empty($product)){
               return $this->view->response($product, 200);
            }else {
                $this->view->response("No existe la tarea con el id={$id}", 404);
            }
        }
    }

    public function ordenarProduct($params = []) {
        $ele = $params[':ELEMENTO'];
        $order = $params[':ORDER'];
        $arrayElementos = ['id_product','name', 'description', 'price']; 
        if (in_array($ele, $arrayElementos)) {
            $products = $this->model->getProductsOrderBy($ele, $order);
            $this->view->response($products, 200);
        }else{
             $this->view->response("No existe un elemento en la tabla con nombre {$ele} o la manera de ordenar es incorrecta", 404);
        }
    }

    public function obtenerProductosPorCategoria($params = []) {
        if((UserHelper::checkSession())){
            $category = $params[':CATEGORY'];
            $products = $this->modelCategory->getProductsByCategory($category);
            if(!empty($products)){
                return $this->view->response($products, 200);
            }else
                $this->view->response("No existe la categoria con el nombre {$category}", 404);
        } else{
            $this->view->response("No tienes los permisos para realizar esta accion. Inicia sesion en /start",403);
        }
    }

    public function agregarProducto() {
        if((UserHelper::checkSession())){
            $product = null;  
            $body =$this->getData();
            if(!empty($body)){
                if(isset($body->name) && isset($body->description) && isset($body->price) && isset($body->id_category_fk) && isset($body->img)){
                    $name = $body->name;
                    $description = $body->description;
                    $price = $body->price;
                    $id_category_fk = $body->id_category_fk;
                    $img = $body->img;
                    $id = $this->model->insertProduct($name, $description,$price,$img, $id_category_fk);
                    $product = $this->model->getProduct($id);
                    $this->view->response($product, 201);
                }else{
                    $this->view->response("La tarea no fue creada porque faltan campos por completar.", 404);
                }
            }
        } else{
            $this->view->response("No tienes los permisos para realizar esta accion. Inicia sesion en /start",403);
        }
    }
    

 
     public function modificarProducto($params = []) {
        if((UserHelper::checkSession())){
            $id = $params[':ID'];
            $product = $this->model->getProduct($id);
            $body =$this->getData();
            
            if ($product && !empty($body)) {
                if(isset($body->name) && isset($body->description) && isset($body->price) && isset($body->id_category_fk) && isset($body->img)){
                    $name = $body->name;
                    $description = $body->description;
                    $price = $body->price;
                    $id_category_fk = $body->id_category_fk;
                    $img = $body->img;
                    $this->model->updateProduct($id, $name, $description,$price,$img, $id_category_fk);
                    $this->view->response("Tarea id= $id actualizada con éxito", 200);
                }else{
                    $this->view->response("La tarea no fue actualizada porque faltan campos por completar.", 404);
                }
            } else {
                $this->view->response("Tarea id= $id not found", 404);
            }
        } else{
            $this->view->response("No tienes los permisos para realizar esta accion. Inicia sesion en /start",403);
        }
    }
}
    


   
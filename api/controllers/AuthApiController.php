<?php

require_once './view/login.php';
require_once './model/UserModel.php';
require_once './api/ApiController.php';

class AuthApiController extends ApiController {

    function __construct() {
        $this->view = new jsonView();
        $this->view2 = new ViewLogin();
        $this->modelUser = new UserModel();
    }

    public function showLogin() {
        $this->view2->showLogin();
    }

    public function login() {
        $usuario = $_POST['user'];
        $password = $_POST['password'];
        $user = $this->modelUser->getUser($usuario);
        if(isset($user) && $user != null && password_verify($password, $user->password)){
            UserHelper::login($user);
            $this->view->response("Bienvenido $user->user.", 200);
        } else{
            $this->view->response("Usuario o contrasenia incorrectos.", 401);
        }
    }
}
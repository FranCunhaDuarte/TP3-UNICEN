<?php

require_once './view/login.php';
require_once './model/UserModel.php';

class AuthApiController {

    private $view;
    private $modelUser;

    function __construct() {
        $this->modelUser = new UserModel();
        $this->view = new ViewLogin();
    }

    public function login() {
        $usuario = $_POST['user'];
        $password = $_POST['password'];
        $user = $this->modelUser->getUser($usuario);
        if(isset($user) && $user != null && password_verify($password, $user->password)){
            UserHelper::login($user);
            $this->view->showLogin();
        } else{
            $error_message = "Nombre de usuario o contraseña incorrectos.";
            $this->view->showLogin($error_message);
        }
    }
}
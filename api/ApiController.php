<?php

require_once './api/jsonView.php';

class ApiController{

    protected $model;
    protected $modelCategory;
    protected $modelUser;
    protected $view;
    private $data;

    public function __construct(){
        $this->view = new jsonView();
        $this->data = file_get_contents("php://input");
    }

    public function getData(){
        return json_decode($this->data);
    }
}
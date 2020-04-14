<?php
/*
    * App Core Class
    * Creates URL & loads core controller
    * URL FORMAT - /controller/method/params
*/

class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
       // print_r($this->getUrl());

       $url = $this->getUrl();
       // Look in controller for first value
       if(file_exists('../app/controller/' . ucwords($url[0]). '.php')) {
           // if exists, set as controller
           $this->currentController = ucwords($url[0]);
           // Unset 0 index
            unset($url[0]);
       }

       // require the controller
       require_once '../app/controller/'. $this->currentController . '.php';

       // Instantiate controller class
       // Pages = new Pages;
       $this->currentController = new $this->currentController;

    }

    public function getUrl() {
       // echo $_GET['url'];
       if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
       }
    }
}
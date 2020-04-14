<?php 
 class Pages extends Controller {
     public function __construct(){
         //echo 'pages loaded';
         $this->postModel = $this->model('Post');
     }
     public function Index(){
         $this->view('Pages/index');
     }
     public function About(){
         $this->view('Pages/about');
     }
 }

 
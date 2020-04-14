<?php 
 class Pages extends Controller {
     public function __construct(){
         //echo 'pages loaded';
     }
     public function Index(){
         $this->view('Pages/index');
     }
     public function About(){
         $this->view('Pages/about');
     }
 }

 
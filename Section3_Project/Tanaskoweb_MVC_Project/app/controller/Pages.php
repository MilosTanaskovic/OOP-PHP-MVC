<?php 
 class Pages extends Controller {
     public function __construct(){
         //echo 'pages loaded';
     }
     public function Index(){
         $this->view('hello');
     }
     public function About($id){
        echo $id;
     }
 }

 
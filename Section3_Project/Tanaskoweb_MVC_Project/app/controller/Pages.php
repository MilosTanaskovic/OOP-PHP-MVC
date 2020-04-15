<?php 
 class Pages extends Controller {
     public function __construct(){
        
     }
     public function Index(){
        $data = [
            'title'  => 'Welcome to Tanaskoweb_MVC Framwork'
        ];

         $this->view('Pages/index', $data);
     }
     public function About(){
         $this->view('Pages/about');
     }
 }

 
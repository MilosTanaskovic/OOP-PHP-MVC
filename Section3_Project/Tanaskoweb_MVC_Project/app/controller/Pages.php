<?php 
 class Pages extends Controller {
     public function __construct(){
        
     }
     public function Index(){
        $data = [
            'title'  => 'SharePosts',
            'description' => 'Simple social network built on the Tanaskoweb_MVC PHP framework'
        ];

         $this->view('Pages/index', $data);
     }
     public function About(){
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];

         $this->view('Pages/about', $data);
     }
 }

 
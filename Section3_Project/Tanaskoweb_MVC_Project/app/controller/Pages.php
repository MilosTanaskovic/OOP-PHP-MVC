<?php 
 class Pages extends Controller {
     public function __construct(){
         //echo 'pages loaded';
         $this->postModel = $this->model('Post');
     }
     public function Index(){
        $posts = $this->postModel->getPosts();
        $data = [
            'title'  => 'Welcome to home page',
            'posts' => $posts
        ];

        

         $this->view('Pages/index', $data);
     }
     public function About(){
         $this->view('Pages/about');
     }
 }

 
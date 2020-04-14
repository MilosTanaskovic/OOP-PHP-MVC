<?php 
 class Pages {
     public function __construct(){
         //echo 'pages loaded';
     }
     public function Index(){
         echo 'index loaded';
     }
     public function About($id){
        echo $id;
     }
 }

 
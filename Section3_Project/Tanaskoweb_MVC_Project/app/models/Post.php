<?php 
class Post{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getPosts(){
        $this->db->query('SELECT * FROM tmvc.posts'); // tmvc is database name
   
        $result = $this->db->resultSet();
        return $result;
    }
}
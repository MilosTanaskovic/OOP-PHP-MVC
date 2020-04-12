<?php 

// Define a class
class User {
    // Properties(atributes)
    //public $name = 'Milos';
    public $name;

    // Methods (functions)
    public function sayHello() {
        return $this->name . 'Says Hello';
    }
}

// Instatiaste a user object fro, user class
$user1 = new User();
$user1->name = 'Milos';

echo $user1->name;
echo $user1->sayHello();

// Create new user
$user2 = new User();
$user2->name = 'Miso';

echo $user2->name;
echo $user2->sayHello();
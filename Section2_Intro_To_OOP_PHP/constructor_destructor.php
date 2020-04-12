<?php

// Constructors and Destructors
 //Constructors and destructors are called when an object is created and destroyed, respectively.
 //An object is 'destoyed' when there are no more references to it. either because the variable holding it was unset/reassigned or the script ended exedution


class User {
    public $name;
    public $age;

    // Runs when an object is created.
    // The __construct() method is by far the most commonly used magic method.
    // This is where you do any initialization you need when an obj is creates.
    // We can define any number of arguments here, which will be passed when creating objects.
    // Any return value will be passed through the new keyword. Any exceptions thrown in the constructor will halt object creation.
    // Declaring the constructor method 'private' prevents external code from direcly creating an object.
    // This is handly for creating singleton classes that restrict the number of objects that can exist.
    public function __construct($a_name, $a_age) { // magic method
        echo 'Class ' . __CLASS__ . ' instantiated';
        $this->name = $a_name;
        $this->age = $a_age;

        // or for example, connect to the network
        $this->connect();
    }

    public function sayHello() {
        return $this->name. 'Says Hello';
    }

    // Called when no other references to a certain object
    // Used for cleanup, closing connections, etc..
    // As the name implies, the __destruct() method is called when the obj is destroyed.
    // It accepts no arguments and is commonly used to perform any cleanup operations such as closing a database connection.
    public function __destruct() { // -> magic method
        echo 'destructor ran...';
        // for example, disconect from the network
        $this->disconect();
    }
}

$user1 = new User('Milos', 26);

echo $user1->name . 'is' . $user1->age;
echo $user1->sayHello();

$user2 = new User('Jelena', 27);

echo $user2->name . 'is' . $user2->age;
echo $user2->sayHello();
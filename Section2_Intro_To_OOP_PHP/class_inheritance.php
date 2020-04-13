<?php
// In this leason we will learn about class inheritance...

class User {

    protected $name = 'Dragan';
    protected $age;

    public function __construct($name , $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

class Customer extends User {

    private $balance;

    public function __contsruct($name, $age, $balance){
        parent::__constuct($name, $age);
        $this->balance = $balance;
    }

    public function pay($amount) {
        return $this->name . ' should be swish me ' . $amount . ' SEK'; 
    }

    public function getBalance() {
        return $this->balance;
    }
}

// create an Object
$customer1 = new Customer('Jelena', 27, 500);

//echo $customer1->pay(450);
echo $customer1->getBalance();

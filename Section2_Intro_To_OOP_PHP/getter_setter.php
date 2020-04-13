<?php
// In this leason we will learn about access modifiers , getter, set_magic_quotes_runtime


class User {
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    // Property overloading

    // __get MAGIC METHOD is called when sode attempts to access a property that is not accessible.
    // It accepts one argument, which is the name of the property.
    // It should return a value, which will be treated as the value of the property.
    // A popular use of the __get() method is to extend the access control by creating 'read-only' properties.
    public function __get($property) {
        if(property_exists($this, $property)){
            return $this->$property;
        }
        return null;
    }
    // __set MAGIC METHOD is called when code attempts to change the value a property that is not accessible.
    // It accepts two arguments, which are the name of the property and the value.
    public function __set($property, $value) {
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
}

$user1 = new User('Milos', 26);

//echo $user1->name;
//echo $user1->name = 'Miki'  attribute is private, we can't access this attribute

//echo $user1->getName();
//echo $user1->name = 'Dragan';
$user1->__set('age', 27);
echo $user1->__get('name');
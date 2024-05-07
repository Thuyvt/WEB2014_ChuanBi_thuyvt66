<?php
class Person {
    private $name;
    private $age;
    private $address;

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function canVote() {
        if ($this->age >= 18) {
            return true;
        } else {
            return false;
        }
    }

    public function getInfo() {
        return "Name: ". $this->name. 
                ".Age: ". $this->age . 
                ".Address: ". $this->address;
    }

}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//
// Person() ... Person("John") ... Person("John", 32);

class MyClass {
    // private, protected, public
    private $memberVar = "Default Value";
    private $name = "Default Name";

    public function __construct($arg1=NULL, $arg2=NULL) {
        //echo "Constructor was called\n";
    }

    public function __destruct() {
        //echo "Destructor was called\n";
    }

    public function __set($name, $value) {
        switch($name) {
            case "memberVar": $this->memberVar = $value;
            break;
            case "name": $this->name = $value;
            break;
        }
        /* // could use if, elseif, elseif... else statements
        if($name=='memberVar')
            $this->memberVar = $value;
        */
    }

    public function __get($name) {
        if($name=='memberVar') {
            echo "<br>Getting memberVar: ";
            return($this->$name); // $this->memberVar
        }
        return($this->$name); // $this->memberVar
    }

    public function display() {
        echo "<br>MyClass::display: {$this->memberVar}<br>";
    }
    
    // public function setMemberVar()
    // obj->'memberVar' = '123'; // call __set  mutator
    //public function getMemberVar()
    // obj->getMemeberVar() 
}

class Derived extends MyClass {
    public function display() {
        MyClass::display(); // this->display parent's class
        echo "<br>Derived::display: {$this->memberVar}<br>";
    }
}


$obj = new MyClass; // constructor invoked
/*
$str = 'memberVar';
$obj->$str
*/

echo $obj->memberVar;
echo "<br>";
$obj->memberVar = 123; // $obj->__set(memberVar, 123);
echo $obj->memberVar;   
echo "<br>";

$obj->display();
echo "<hr>";

$dobj= new Derived();
$dobj->display();

unset($obj);        // destructor invoked
?>

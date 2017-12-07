<?php
//Static variables are shared between sub classes()
class MyParent {
   
    protected static $variable;
}

class Child1 extends MyParent {
   
    function set() {
       
        self::$variable = 2;
    }
}

class Child2 extends MyParent {
   
    function show() {
       
        echo(self::$variable);
    }
}

$c1 = new Child1();
$c1->set();
$c2 = new Child2();
$c2->show(); // prints 2


// To check if a function was called statically or not, you'll need to do:
function foo () {
    $isStatic = !(isset($this) && get_class($this) == __CLASS__);
}

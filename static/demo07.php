<?php
//How to implement a one storage place based on static properties.
class a {
   
    public function get () {
        echo "\n turn to a::get() : ".$this->connect()."\n";
    }
}
class b extends a {
    private static $a;

    public function connect() {
        echo "\n turn to b::connect()...\n";
        return self::$a = 'b';
    }
}
class c extends a {
    private static $a;

    public function connect() {
        echo "\n turn to c::connect()...\n";
        return self::$a = 'c';
    }
}
$b = new b ();
$c = new c ();

$b->get();  //first turn to sub class(b/c) connect method, and then turn to parent::get()
$c->get();
<?php
class Base {
    public function sayHello() {
        echo 'Hello '."\n";
    }
}

trait SayWorld {

	//If this not exist, it would turn to Base::sayHello directly
    public function sayHello() {
        parent::sayHello();
        echo 'World!'."\n";
    }
}

class MyHelloWorld extends Base {
    use SayWorld;

    //If Add this, $o->sayHello() would output First turn! only for its priority
    public function sayHello() {
        echo 'First turn!'."\n";
    }
}

$o = new MyHelloWorld();
$o->sayHello();   //output: Hello World! 
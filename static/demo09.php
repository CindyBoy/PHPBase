<?php

//Starting with php 5.3 you can get use of new features of static keyword. Here's an example of abstract singleton class:

//抽象类继承另外一个抽象类时，不用重写其中的抽象方法。抽象类中，不能重写抽象父类的抽象方法。这样的用法，可以理解为对抽象类的扩展。

abstract class Singleton {

    protected static $_instance = NULL;

    /**
     * Prevent direct object creation
     */
    final private function  __construct() {
        echo "\n final private __construct ...  \n";
    }

    /**
     * Prevent object cloning
     */
    final private function  __clone() {
        echo "\n final private __clone ...  \n";
    }

    /**
     * Returns new or existing Singleton instance
     * @return Singleton
     */
    final public static function getInstance(){
        echo "\n final public getInstance ... {static::$_instance} \n";
        if(null !== static::$_instance){
            return static::$_instance;
        }
        static::$_instance = new static();
        return static::$_instance;
    }
}

/**
* Test 
*/
// class Test extends Singleton
// {
    
// }

$t =new Singleton();
//PHP Fatal error:  Uncaught Error: Cannot instantiate abstract class Singleton in ~demo9.php:45

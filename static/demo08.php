<?php
/*
this is the example to use new class with static method..
i hope it help
*/
class foo {
    private static $getInitial;

    public static function getInitial() {
        if (self::$getInitial == null){       	
            self::$getInitial = new foo();
        }

        var_dump(self::$getInitial);  //output: object(foo)#1 (0) {}
        return self::$getInitial;
    }
}

foo::getInitial();
foo::getInitial();

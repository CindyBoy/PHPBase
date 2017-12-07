<?php
class A {
    protected static $a;
   
    public static function init($value) { 
    	echo "A init ...\n";
    	self::$a = $value; 
    }
    public static function getA() { 
    	echo "A getA ...\n";
    	return self::$a; 
    }
}

class B extends A {
    protected static $a; // redefine $a for own use
   
    // inherit the init() method
    public static function getA() { 
    	echo "B getA ...\n";
    	return self::$a; 
    }
}

B::init('lala');  //output: A init ...
echo 'A::$a = '.A::getA().';'."\n"; //A::getA() is lala
echo "\n".' B::$a = '.B::getA()."\n";  //B::getA() is null


/**
If the init() method looks the same for (almost) all subclasses there should be no need to implement init() in every subclass and by that producing redundant code.

Solution 1:
Turn everything into non-static. BUT: This would produce redundant(冗余) data on every object of the class.

Solution 2:
Turn static $a on class A into an array, use classnames of subclasses as indeces. By doing so you also don't have to redefine $a for the subclasses and the superclass' $a can be private.
*/
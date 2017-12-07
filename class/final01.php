<?php
//如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承。 
class BaseClass
{
    protected static $var = 'i belong to BaseClass';

    public static function test()
    {
        echo '<hr>'.
            'i am `'.__METHOD__.'()` and this is my var: `'.self::$var.'`<br>'."\n";
    }
    public static function changeVar($val)
    {
        self::$var = $val;
        echo '<hr>'.
            'i am `'.__METHOD__.'()` and i just changed my $var to: `'.self::$var.'`<br>'."\n";
    }
     public static function dontCopyMe($val)
    {
        self::$var = $val;
        echo '<hr>'.
            'i am `'.__METHOD__.'()` and i just changed my $var to: `'.self::$var.'`<br>'."\n";
    }
}

class ChildClass extends BaseClass
{
    protected static $var = 'i belong to ChildClass';

    public static function test()
    {
        echo '<hr>'.
            'i am `'.__METHOD__.'()` and this is my var: `'.self::$var.'`<br>'.
            'and this is my parent var: `'.parent::$var.'`'."\n";
    }
    public static function changeVar($val)
    {
        self::$var = $val;
        echo '<hr>'.
            'i am `'.__METHOD__.'()` and i just changed my $var to: `'.self::$var.'`<br>'.
            'but the parent $var is still: `'.parent::$var.'`'."\n";
    }
    public static function dontCopyMe($val) // Fatal error: Cannot override final method BaseClass::dontCopyMe() in ...
    {
        self::$var = $val;
        echo '<hr>'.
            'i am `'.__METHOD__.'()` and i just changed my $var to: `'.self::$var.'`<br>'."\n";
    }
}

BaseClass::test();  // i am `BaseClass::test()` and this is my var: `i belong to BaseClass`
ChildClass::test(); // i am `ChildClass::test()` and this is my var: `i belong to ChildClass`
                    // and this is my parent var: `i belong to BaseClass`
ChildClass::changeVar('something new'); // i am `ChildClass::changeVar()` and i just changed my $var to: `something new`
                                        // but the parent $var is still: `i belong to BaseClass`
BaseClass::changeVar('something different'); // i am `BaseClass::changeVar()` and i just changed my $var to: `something different`
BaseClass::dontCopyMe('a text'); // i am `BaseClass::dontCopyMe()` and i just changed my $var to: `a text`
ChildClass::dontCopyMe('a text'); // Fatal error: Cannot override final method BaseClass::dontCopyMe() in ...
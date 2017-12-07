<?php
class Foo
{
    const BAR = 'const';
   
    public static function bar()
    {
        return 'static';
    }
}

echo Foo::BAR . PHP_EOL; // Prints "const"
echo Foo::bar() . PHP_EOL; // Prints "static"

$var = 'Foo';
echo $var::BAR . PHP_EOL; // Prints "const" in PHP 5.3.0/PHP7, ("Syntax error" in older versions)
echo $var::bar() . PHP_EOL; // Prints "static" in PHP 5.3.0/PHP7, ("Syntax error" in older versions)

$object = new stdClass;
$object->class = 'Foo';
echo $object->class::BAR . PHP_EOL; // ("Syntax error" in PHP 5.3.0), prints "const" in PHP 7
echo $object->class::bar() . PHP_EOL; // ("Syntax error" in PHP 5.3.0), prints "static" in PHP 7
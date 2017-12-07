<?php

//匿名类很有用，可以创建一次性的简单对象


// PHP 7 之前的代码
// class Logger
// {
//     public function log($msg)
//     {
//         echo "\n Logger:: ".$msg."\n";
//     }
// }

// // $util->setLogger(new Logger());

// // 使用了 PHP 7+ 后的代码
// $util->setLogger(new class {
//     public function log($msg)
//     {
//         echo $msg;
//     }
// });


//可以传递参数到匿名类的构造器，也可以扩展（extend）其他类、实现接口（implement interface），以及像其他普通的类一样使用 trait： 
class SomeClass {}
interface SomeInterface {}
trait SomeTrait {}

var_dump(new class(10) extends SomeClass implements SomeInterface {
    private $num;

    public function __construct($num)
    {
        $this->num = $num;
    }

    use SomeTrait;
});

/*
object(class@anonymous)#1 (1) {
  ["num":"class@anonymous":private]=>
  int(10)
}
*/

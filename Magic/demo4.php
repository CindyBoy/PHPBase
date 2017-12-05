<?php

// 本方法的唯一参数是一个数组，其中包含按 array('property' => value, ...) 格式排列的类属性
//通过var_export函数调用对象才能调用__set_state方法


//Be very careful to define __set_state() in classes which inherit from a parent using it, as the static __set_state() call will be called for any children.  If you are not careful, you will end up with an object of the wrong type. 

class A
{
    public $var1;
    // public $var2;

    public static function __set_state($an_array) // As of PHP 5.1.0
    {
    	echo "<br/>__set_state<br/>";
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        // $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
var_dump(serialize($a));
$a->var1 = 5;
$a->var2 = 'foo';
var_dump(serialize($a));
echo "<br/>================<br/>";
var_export($a);
echo "<br/>================<br/>";
eval('$b = ' . var_export($a, true) . ';'); // $b = A::__set_state(array(
                                            //    'var1' => 5,
                                            //    'var2' => 'foo',
                                            // ));
echo "<br/>================<br/>";
var_dump($b);


echo "<br/>=========BBBBBBBBBBBBBB=======<br/>";
class B extends A { 
} 

$b = new B; 
$b->var1 = 6; 
echo "<br/>================<br/>";
eval('$new_b = ' . var_export($b, true) . ';'); 
echo "<br/>================<br/>";
var_dump($new_b); 
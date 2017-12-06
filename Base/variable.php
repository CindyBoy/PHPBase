<?php

//比较变量的内存使用情况

// 定义一个变量
$a = range(0, 1000);
var_dump(memory_get_usage());

// 定义变量b，将a变量的值赋值给b
// COW Copy On Write
$b = $a;
var_dump(memory_get_usage());

// 对a进行修改
$a = range(0, 1000);
var_dump(memory_get_usage());




// 定义一个变量
$a = range(0, 1000);
var_dump(memory_get_usage());

// 定义变量b，将a变量的值赋值给b
$b = &$a;
var_dump(memory_get_usage());

// 对a进行修改
$a = range(0, 1000);
var_dump(memory_get_usage());



// zval变量容器
$a = range(0, 3);
xdebug_debug_zval('a');

// 定义变量b，把a的值赋值给b
$b = $a;
xdebug_debug_zval('a');

// 修改a
$a = range(0, 3);
xdebug_debug_zval('a');


$a = range(0, 3);
xdebug_debug_zval('a');

$b = &$a;
xdebug_debug_zval('a');

$a = range(0, 3);
xdebug_debug_zval('a');


// unset 只会取消引用，不会销毁空间
$a = 1;
$b = &$a;
unset($b);
echo $a. "\n";


//变量应用
$a = 0;
$b = 0;
if ($a = 3 > 0 || $b = 3 > 0) 
{
	var_dump($a) //True
	var_dump($b) //True
    $a++;
    $b++;
    echo $a. "\n";  //1
    echo $b. "\n";
}




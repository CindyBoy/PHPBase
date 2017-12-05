<?php

// 当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用。
// 本特性只在 PHP 5.3.0 及以上版本有效。

class CallableClass 
{
	public function __construct(){
		echo "<br/>__construct<br/>";
	}

    function __invoke($x) {
    	echo "<br/>__invoke<br/>";
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));

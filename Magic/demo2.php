<?php


// __toString() 方法用于一个类被当成字符串时应怎样回应。例如 echo $obj; 应该显示些什么。此方法必须返回一个字符串，否则将发出一条 E_RECOVERABLE_ERROR 级别的致命错误。
// Declare a simple class


//How does it work? Well PHP __toString() handling is not as strict in every case: throwing an Exception from __toString() triggers a fatal E_ERROR, but returning a non-string value from a __toString() triggers a non-fatal E_RECOVERABLE_ERROR. 
// Add a little bookkeeping, and can circumvented this PHP deficiency!
// (tested to work PHP 5.3+)
class TestClass
{
    public $foo;

    public function __construct($foo) 
    {
    	echo "__construct";
        $this->foo = $foo;
    }

    public function __toString() {
    	echo "string";
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class;

// 需要指出的是在 PHP 5.2.0 之前，__toString() 方法只有在直接使用于 echo 或 print 时才能生效。PHP 5.2.0 之后，则可以在任何字符串环境生效（例如通过 printf()，使用 %s 修饰符），但不能用于非字符串环境（如使用 %d 修饰符）。自 PHP 5.2.0 起，如果将一个未定义 __toString() 方法的对象转换为字符串，会产生 E_RECOVERABLE_ERROR 级别的错误
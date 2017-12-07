
<?php
//Below three examples describe anonymous class with very simple and basic but quite understandable example

// First way - anonymous class assigned directly to variable
$ano_class_obj = new class{
    public $prop1 = 'hello';
    public $prop2 = 754;
    const SETT = 'some config';

    public function getValue()
    {
        // do some operation
        return 'some returned value';
    }

    public function getValueWithArgu($str)
    {
        // do some operation
        return 'returned value is '.$str;
    }
};

echo "\n";

var_dump($ano_class_obj);
/** output
object(class@anonymous)#1 (2) {
  ["prop1"]=>
  string(5) "hello"
  ["prop2"]=>
  int(754)
}
*/



echo "\n";
echo $ano_class_obj->prop1;  //output: hello
echo "\n";

echo $ano_class_obj->prop2;  //output:754
echo "\n";

echo $ano_class_obj::SETT;  //output: some config
echo "\n";

echo $ano_class_obj->getValue();  //output: some returned value
echo "\n";

echo $ano_class_obj->getValueWithArgu('OOP');  //output: returned value is OOP
echo "\n";

echo "\n";

// Second way - anonymous class assigned to variable via defined function
$ano_class_obj_with_func = ano_func();

function ano_func()
{
    return new class {
        public $prop1 = 'hello';
        public $prop2 = 754;
        const SETT = 'some config';

        public function getValue()
        {
            // do some operation
            return 'some returned value';
        }

        public function getValueWithArgu($str)
        {
            // do some operation
            return 'returned value is '.$str;
        }
    };
}

echo "\n";



var_dump($ano_class_obj_with_func);
/** output
object(class@anonymous)#2 (2) {
  ["prop1"]=>
  string(5) "hello"
  ["prop2"]=>
  int(754)
}
*/
echo "\n";

echo $ano_class_obj_with_func->prop1; //output: hello
echo "\n";

echo $ano_class_obj_with_func->prop2;//output: 754
echo "\n";

echo $ano_class_obj_with_func::SETT;//output: some config
echo "\n";

echo $ano_class_obj_with_func->getValue();//output: some returned value
echo "\n";

echo $ano_class_obj_with_func->getValueWithArgu('OOP');//output: returned value is OOP
echo "\n";

echo "\n";

// Third way - passing argument to anonymous class via constructors
$arg = 1; // we got it by some operation
$config = [2, false]; // we got it by some operation
$ano_class_obj_with_arg = ano_func_with_arg($arg, $config);

function ano_func_with_arg($arg, $config)
{
    return new class($arg, $config) {
        public $prop1 = 'hello';
        public $prop2 = 754;
        public $prop3, $config;
        const SETT = 'some config';

        public function __construct($arg, $config)
        {
            $this->prop3 = $arg;
            $this->config =$config;
        }

        public function getValue()
        {
            // do some operation
            return 'some returned value';
        }

        public function getValueWithArgu($str)
        {
            // do some operation
            return 'returned value is '.$str;
        }
    };
}

echo "\n";

var_dump($ano_class_obj_with_arg);
/** output
object(class@anonymous)#3 (4) {
  ["prop1"]=>
  string(5) "hello"
  ["prop2"]=>
  int(754)
  ["prop3"]=>
  int(1)
  ["config"]=>
  array(2) {
    [0]=>
    int(2)
    [1]=>
    bool(false)
  }
}
*/
echo "\n";

echo $ano_class_obj_with_arg->prop1;  //output: hello
echo "\n";

echo $ano_class_obj_with_arg->prop2;  //output: 754
echo "\n";

echo $ano_class_obj_with_arg::SETT;   //output: some config
echo "\n";

echo $ano_class_obj_with_arg->getValue();   //output: some returned value
echo "\n";

echo $ano_class_obj_with_arg->getValueWithArgu('OOP');  //output: returned value is OOP
echo "\n";

echo "\n";





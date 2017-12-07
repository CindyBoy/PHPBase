
<?php

class Outer
{
    private $prop = 1;
    protected $prop2 = 2;

    protected function func1()
    {
        return 3;
    }

    public function func2()
    {
        echo "\n ===== func2 ==== \n";
        return new class($this->prop) extends Outer {
            private $prop3;

            public function __construct($prop)
            {
                echo "\n  func2-> __construct  \n";
                $this->prop3 = $prop;
            }

            public function func3()
            {
                echo "\n  func2-> func3  \n";
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }
}

echo (new Outer)->func2()->func3();
/**output:
 ===== func2 ==== 
  func2-> __construct  
  func2-> func3
  6
*/

echo "\n  Example two...  \n";
function anonymous_class()
{
    return new class {};
}

if (get_class(anonymous_class()) === get_class(anonymous_class())) {
    echo 'same class';   //output result
} else {
    echo 'different class';
}
echo "\n one::".get_class(anonymous_class());
echo "\n two::".get_class(new class {});

/**
one::class@anonymous~demo02.php0x7ff941e91353
two::class@anonymous~demo02.php0x7ff941e91441
**/
 <?php
// For those of you who have the same trouble as osbertv.

 trait TInnerClosuresInvoker {
  function __call($method, $args) {
    if (isset($this->$method) && is_callable($method)) {
      $closure = $this->$method;
      var_dump($closure);
      call_user_func_array($closure, $args);
    } else {
      trigger_error('Call to undefined method '.__CLASS__.'::'.$method.'()', E_USER_ERROR);
    }
  }
}


class A
{
    public $var1;
    use TInnerClosuresInvoker;
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

class B extends A { 
} 


$a = new A();
$b = new B();
var_dump($a);
var_dump($b);
// $a1 =$a();
// $b1 =$b();
$a1 =$b->a;
// $a1();
var_dump($a1);

// exit();
//  PHP Fatal error:  Call to undefined method B::a()

// It's because PHP have bug in parsing syntax (a lot of).
// Just make it easier to parse and it would work.
// For example, like this: -->

// $c = $b->a;
// $c();


// Or this, if you use 5.4 (if you using 5.3 just move call function to the each class which need it or to some base abstract class):




// It's a little bit dirty, but it works.
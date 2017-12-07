<?php
/**
Anonymous classes are syntax sugar that may appear deceiving to some.
The 'anonymous' class is still parsed into the global scope, where it is auto assigned a name, and every time the class is needed, that global class definition is used.  Example to illustrate....

The anonymous class version...
*/

function return_anon(){
    return new class{
         public static $str="foo"; 
    };
}
$test=return_anon();
echo $test::$str; //ouputs foo

//we can still access the 'anon' class directly in the global scope!
$another=get_class($test); //get the auto assigned name
echo $another::$str;    //outputs foo


// The above is functionally the same as doing this....
class I_named_this_one{
    public static $str="foo";
}
function return_not_anon(){
    return 'I_named_this_one';
}
$clzz=return_not_anon();//get class name
echo $clzz::$str;
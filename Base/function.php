<?php
//Example one:
function &myFunc()  //If not add operator &, The third echo must be 10
{
    static $b = 10;
    return $b;
}

echo myFunc();
echo "<br/>===========<br/>";
$a = &myFunc();  //If not add operator &, The third echo must be 10
$a = 100;
echo myFunc();


//Example two:
$count = 5;
function get_count(){
    static $count;  
    return $count++;
}
echo $count;   //output:5
++$count;      //output:6

echo get_count();   //enter the function,the varaible count is null as 0
echo "<br/>=========<br/>";
echo get_count();  //output $count is 1


//Example three:
$var1 = 5;
$var2 = 10;
function foo(&$my_var){
    global $var1;  //var1=5, var2=null or var2=0
    $var1 += 2;
    $var2 = 4;
    $my_var += 3;
    return $var2;
}

$my_var = 5;
echo foo($my_var). "\n";
echo $my_var. "\n";
echo $var1;
echo $var2;
$bar = 'foo';
$my_var = 10;
echo $bar($my_var). "\n"; //This way can call the  foo function
<?php

/**
C++-style operator overloading finally makes an appearance with the introduction to __invoke().  Unfortunately, with just '()'.  In that sense, it is no more useful than having a default class method (probably quite useful actually) and not having to type out an entire method name.  Complimenting wbcarts at juno dot com's point class below, the following allows calculating distance between one or more graph points...
**/

// Functionally, __invoke() can also be used to mimic the use of variable functions.  Sadly, attempting any calling of __invoke() on a static level will produce a fatal error.
class point {
    public $x;
    public $y;

    function __construct($x=0, $y=0) {
    	var_dump("__construct");
        $this->x = (int) $x;
        $this->y = (int) $y;
    }
        
    function __invoke() {
        $args = func_get_args();
        var_dump($args);
        echo "<br/>=======================<br/>";
        $total_distance = 0;
        $current_loc = $this;
        foreach ($args as $arg) {
            if (is_object($arg) and (get_class($arg) === get_class($this))) {
                $total_distance += sqrt(pow($arg->x - $current_loc->x, 2) + pow((int) $arg->y - $current_loc->y, 2));
                var_dump($total_distance);
                $current_loc = $arg;
                }
            else {
                trigger_error("Arguments must be objects of this class.");
                return;
                }
            }
        return $total_distance;
        }
    
    }

$p1 = new point(1,1);
echo "<br/>=======================<br/>";
$p2 = new point(23,-6);
echo "<br/>=======================<br/>";
$p3 = new point(15,20);
echo "<br/>=======================<br/>";
echo $p1($p2,$p3,$p1); // round trip 73.89

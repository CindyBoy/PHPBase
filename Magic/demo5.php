<?php

//__debugInfo()
//This method is called by var_dump() when dumping an object to get the properties that should be shown. If the method isn't defined on an object, then all public, protected and private properties will be shown.
//This feature was added in PHP 5.6.0.


class C {
    private $prop;
    private $prop2;

    public function __construct($val) {
    	echo "<br/>================<br/>";
		echo "__construct";
		echo "<br/>================<br/>";
        $this->prop = $val;
        $this->prop2 = 3;
    }

    public function __debugInfo() {
    	echo "<br/>================<br/>";
		echo "__debugInfo====".$this->prop;
		echo "<br/>================<br/>";
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }
}

var_dump(new C(42));
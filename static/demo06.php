<?php

//It's come to my attention that you cannot use a static member in an HEREDOC string.  The following code

class A
{
  public static $BLAH = "user";

  function __construct()
  {
  	//$blah = self::$BLAH;   // Add this line, and then change line 14 $BLAH to $blah
  	//PHP Notice:  Undefined variable: BLAH in ~demo6.php on line 14
    echo <<<EOD
<h1>Hello {self::$BLAH}</h1>
EOD;
  }
}

$blah = new A();  //output:<h1>Hello {self::}</h1>

//before using a static member, store it in a local variable, like line 11:


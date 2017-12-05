<?php

// The sequence of events regarding __sleep and __destruct is unusual __ as __destruct is called before __sleep. The following code snippet:

// $sequence = 0;
// class foo {
//     public $stuff;    
//     public function __construct($param) {
//         global $sequence;
//         echo "<br/>============__construct===========<br/>";
//         echo "Seq: ", $sequence++, " - constructor\n";
//         $this->stuff = $param;
//     }
//     public function __destruct() {
//     	echo "<br/>============__destruct===========<br/>";
//         global $sequence;
//         echo "Seq: ", $sequence++, " - destructor\n";
//     }
//     public function __sleep() {
//     	echo "<br/>============__sleep===========<br/>";
//         global $sequence;
//         echo "Seq: ", $sequence++, " - __sleep\n";
//         return array("stuff");
//     }
//     public function __wakeup() {
//     	echo "<br/>============__wakeup===========<br/>";
//         global $sequence;
//         echo "Seq: ", $sequence++, " - __wakeup\n";
//     }
// }
// session_start();
// $_SESSION["obj"] = new foo("A foo");

// exit();

// yields the output:

// Seq: 0 - constructor
// Seq: 1 - destructor
// Seq: 2 - __sleep

// Only when you end your script with a call to session_write_close() as in:
//Part Two

$sequence = 0;
class foo {
    public $stuff;    
    public function __construct($param) {
    	echo "<br/>============__construct===========<br/>";
        global $sequence;
        echo "Seq: ", $sequence++, " - constructor\n";
        $this->stuff = $param;
    }
    public function __destruct() {
    	echo "<br/>============__destruct===========<br/>";
        global $sequence;
        echo "Seq: ", $sequence++, " - destructor\n";
    }
    public function __sleep() {
    	echo "<br/>============__sleep===========<br/>";
        global $sequence;
        echo "Seq: ", $sequence++, " - __sleep\n";
        return array("stuff");
    }
    public function __wakeup() {
    	echo "<br/>============__wakeup===========<br/>";
        global $sequence;
        echo "Seq: ", $sequence++, " - __wakeup\n";
    }
}
session_start();
$_SESSION["obj"] = new foo("A foo");
session_write_close();


// the sequence is as common sense would expect it to be as the following output shows:

// Seq: 0 - constructor
// Seq: 1 - __sleep
// Seq: 2 - destructor
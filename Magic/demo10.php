

<!-- If a Variable is already set, the __set Magic Method already wont appear!

My first solution was to use a Caller Class.
With that, i ever knew which Module i currently use!
But who needs it... :]
There are quiet better solutions for this...
Here's the Code:
 -->
<?php
class Caller {
    public $caller;
    public $module;

    function __call($funcname, $args = array()) {
        $this->setModuleInformation();

        if (is_object($this->caller) && function_exists('call_user_func_array'))
            $return = call_user_func_array(array(&$this->caller, $funcname), $args);
        else
            trigger_error("Call to Function with call_user_func_array failed", E_USER_ERROR);
        
        $this->unsetModuleInformation();
        return $return;
    }

    function __construct($callerClassName = false, $callerModuleName = 'Webboard') {
        if ($callerClassName == false)
            trigger_error('No Classname', E_USER_ERROR);

        $this->module = $callerModuleName;

        if (class_exists($callerClassName))
            $this->caller = new $callerClassName();
        else
            trigger_error('Class not exists: \''.$callerClassName.'\'', E_USER_ERROR);

        if (is_object($this->caller))
        {
            $this->setModuleInformation();
            if (method_exists($this->caller, '__init'))
                $this->caller->__init();
            $this->unsetModuleInformation();
        }
        else
            trigger_error('Caller is no object!', E_USER_ERROR);
    }

    function __destruct() {
        $this->setModuleInformation();
        if (method_exists($this->caller, '__deinit'))
            $this->caller->__deinit();
        $this->unsetModuleInformation();
    }

    function __isset($isset) {
        $this->setModuleInformation();
        if (is_object($this->caller))
            $return = isset($this->caller->{$isset});
        else
            trigger_error('Caller is no object!', E_USER_ERROR);
        $this->unsetModuleInformation();
        return $return;
    }

    function __unset($unset) {
        $this->setModuleInformation();
        if (is_object($this->caller)) {
            if (isset($this->caller->{$unset}))
                unset($this->caller->{$unset});
        }
        else
            trigger_error('Caller is no object!', E_USER_ERROR);
        $this->unsetModuleInformation();
    }

    function __set($set, $val) {
        $this->setModuleInformation();
        if (is_object($this->caller))
            $this->caller->{$set} = $val;
        else
            trigger_error('Caller is no object!', E_USER_ERROR);
        $this->unsetModuleInformation();
    }

    function __get($get) {
        $this->setModuleInformation();
        if (is_object($this->caller)) {
            if (isset($this->caller->{$get}))
                $return = $this->caller->{$get};
            else
                $return = false;
        }
        else
            trigger_error('Caller is no object!', E_USER_ERROR);
        $this->unsetModuleInformation();
        return $return;
    }
    
    function setModuleInformation() {
        $this->caller->module = $this->module;
    }

    function unsetModuleInformation() {
        $this->caller->module = NULL;
    }
}

// Well this can be a Config Class?
class Config {
    public $module;

    public $test;

    function __construct()
    {
        print('Constructor will have no Module Information... Use __init() instead!<br />');
        print('--> '.print_r($this->module, 1).' <--');
        print('<br />');
        print('<br />');
        $this->test = '123';
    }
    
    function __init()
    {
        print('Using of __init()!<br />');
        print('--> '.print_r($this->module, 1).' <--');
        print('<br />');
        print('<br />');
    }
    
    function testFunction($test = false)
    {
        if ($test != false)
            $this->test = $test;
    }
}

echo('<pre>');
$wow = new Caller('Config', 'Guestbook');
print_r($wow->test);
print('<br />');
print('<br />');
$wow->test = '456';
print_r($wow->test);
print('<br />');
print('<br />');
$wow->testFunction('789');
print_r($wow->test);
print('<br />');
print('<br />');
print_r($wow->module);
echo('</pre>');
?>
<!-- 
Outputs something Like:

Constructor will have no Module Information... Use __init() instead!
-->  <--

Using of __init()!
--> Guestbook <--

123

456

789

Guestbook -->
<?php
// When you use sessions, its very important to keep the sessiondata small, due to low performance with unserialize. Every class shoud extend from this class. The result will be, that no null Values are written to the sessiondata. It will increase performance.


class BaseObject
{
    function __sleep()
    {
        $vars = (array)$this;
        foreach ($vars as $key => $val)
        {
            if (is_null($val))
            {
                unset($vars[$key]);
            }
        }    
        return array_keys($vars);
    }
};
?>
<?php

// Caution:PHP 将所有以 __（两个下划线）开头的类方法保留为魔术方法

//介绍__sleep() 和 __wakeup()
// /serialize() 函数会检查类中是否存在一个魔术方法 __sleep()。如果存在，该方法会先被调用，然后才执行序列化操作。
//__sleep() 不能返回父类的私有成员的名字， __sleep() 方法常用于提交未提交的数据，或类似的清理操作。

//unserialize() 会检查是否存在一个 __wakeup() 方法。如果存在，则会先调用 __wakeup 方法，预先准备对象需要的资源。
//__wakeup() 经常用在反序列化操作中，例如重新建立数据库连接，或执行其它初始化操作。

class Connection 
{
    protected $link;
    private $server, $username, $password, $db;
    
    public function __construct($server, $username, $password, $db)
    {
    	echo "__construct<br/>";
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $this->connect();
    }
    
    private function connect()
    {
        $this->link = mysql_connect($this->server, $this->username, $this->password);
        echo "connect...<br/>";
        var_dump($this->link);
        echo "connect...<br/>";
        mysql_select_db($this->db, $this->link);
    }
    
    public function __sleep()
    {
    	echo "<br/>===============</br/>";
    	echo "__sleep<br/>";
    	echo "<br/>===============</br/>";
        return array('server', 'username', 'password', 'db');
    }
    
    public function __wakeup()
    {
    	echo "<br/>===============</br/>";
    	echo "__wakeup<br/>";
    	echo "<br/>===============</br/>";
        $this->connect();
    }
}


$cls =new Connection('localhost', 'root', '', 'online');
$res =serialize($cls);
print_r($res);
$res2 =unserialize($res);
print_r($res2);
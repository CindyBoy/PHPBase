<?php
abstract class DataRecord {
    private static $db; // MySQLi-Connection, same for all subclasses
    private static $table = array(); // Array of tables for subclasses
   
    public static function init($classname, $table, $db = false) {
        if (!($db === false)) self::$db = $db;
        self::$table[$classname] = $table;
    }
   
    public static function getDB() { return self::$db; }
    public static function getTable($classname) { return self::$table[$classname]; }
}

class UserDataRecord extends DataRecord {
    
    public static function fetchFromDB() {
        $result = parent::getDB()->query('select * from '.parent::getTable('UserDataRecord').';');
       
        // and so on ...
        return $result; // An array of UserDataRecord objects
    }
}

$db = new MySQLi();
UserDataRecord::init('UserDataRecord', 'users', $db);
$users = UserDataRecord::fetchFromDB();
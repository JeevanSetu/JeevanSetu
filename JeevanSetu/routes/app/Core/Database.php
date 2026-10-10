<?php
class Database { private static $pdo; public static function db(){ if(!self::$pdo){$c=require __DIR__.'/../../config/config.php';$d=$c['db'];self::$pdo=new PDO("mysql:host={$d['host']};dbname={$d['name']};charset=utf8mb4",$d['user'],$d['pass'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);} return self::$pdo;}}

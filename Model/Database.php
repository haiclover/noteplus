<?php
namespace Model;

use PDO;

class Database{
	protected static $instance = NULL;
	public function __construct(){
		include __DIR__ . '/../config.php';
		$dns = 'mysql:dbname=' . $db_name . ';host=' . $host . ';charset=utf8';
		try{
			self::$instance = new PDO($dns,$user,$pass);
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
		return self::$instance;
	}
	public static function select($sql,$params){
		$stmt = self::$instance->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($params);
		return $stmt->fetch();
	}
	public static function insert($sql,$params){
		$stmt = self::$instance->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($params);
		return self::$instance->lastInsertId();
	}
}
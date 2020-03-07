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
	public static function select(string $sql,array $params,int &$rowCount){
		$stmt = self::$instance->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($params);
		$rowCount = $stmt->rowCount();
		return $stmt->fetch();
	}
	public static function insert(string $sql,array $params){
		$stmt = self::$instance->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute($params);
		return self::$instance->lastInsertId();
	}
}
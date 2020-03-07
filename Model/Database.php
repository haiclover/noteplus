<?php

namespace Model;

use PDO;

class Database implements IDatabase
{
    private static $instance;
    private $query;
    private $params;
    private $rowCount;

    public function __construct()
    {
        include __DIR__ . '/../config.php';
        $connect = 'mysql:dbname=' . DATABASE_NAME . ';host=' . HOST . ';charset=' . CHARSET;
        try {
            self::$instance = new PDO($connect, USER, PASS);
        } catch (PDOException $e) {
            die();
        }
        return self::$instance;
    }

    public static function selectRow(string $query, array $params)
    {
        $stmt = self::$instance->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public static function insertRow(string $query, array $params)
    {
        $stmt = self::$instance->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute($params);
        return self::$instance->lastInsertId();
    }
}
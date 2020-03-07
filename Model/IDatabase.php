<?php

namespace Model;

interface IDatabase
{
    public static function selectRow(string $query, array $params);

    public static function insertRow(string $query, array $params);
}
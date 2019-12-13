<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config/mysql.php');

$dsn = "mysql:host=localhost;dbname=$database;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

/**
 * Apply strip_tags() on each values of an array of strings
 *
 * @param string[] $arr
 */
function sanitizeArray(array &$arr): void
{
    foreach ($arr as $key => $value) {
        $arr[$key] = strip_tags($value);
    }
}
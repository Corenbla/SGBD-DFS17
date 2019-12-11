<?php
session_start();

require '../../config/mysql.php';

$dsn = "mysql:host=localhost;dbname=$database;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die;
}

if ($_POST['username'] == '' || $_POST['password'] =='' ) {
    header('Location: /login.php?error');
}

$credentials = [
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
];
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die;
}

if ($_POST['username'] == '' || $_POST['password'] =='' ) {
    header('Location: /login.php?error');
}

require_once '../PDO/connect.php';

$sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
$stmt = $pdo->prepare();
$stmt->execute([
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($user);
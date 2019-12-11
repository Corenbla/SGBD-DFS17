<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die;
}

if ($_POST['username'] == '' || $_POST['password'] =='' ) {
    header('Location: /login.php?error');
}

require_once '../PDO/connect.php';

$sql = 'INSERT INTO user VALUES (":username", ":password")';
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($result);

<?php

require_once 'connect.php';

$sql = "SELECT * FROM user WHERE username = :username AND password = :password";

$stmt = $pdo->prepare($sql);
$stmt->execute($credentials);

$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($user);

if (sort($user) == sort($credentials)) {
    $_SESSION['user'] = $credentials;
    header('Location: /');
} else {
    header('Location: /login.php?error');
}
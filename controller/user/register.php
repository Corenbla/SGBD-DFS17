<?php

require_once 'connect.php';

$sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);
try {
    $stmt->execute($credentials);
} catch (PDOException $exception) {
    header('Location: /register.php?error');
}

$_SESSION['user'] = $credentials;
header('Location: /');

<?php

require_once 'connect.php';

$sql = "SELECT * FROM user WHERE username = :username AND password = :password";

$stmt = $pdo->prepare($sql);
$stmt->execute($credentials);

$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user['username'] == $credentials['username']
    && $user['password'] == $credentials['password']
) {
    $credentials['id'] = $user['id'];
    $_SESSION['user'] = $credentials;
    header('Location: /');
} else {
    header('Location: /login.php?error');
}
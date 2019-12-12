<?php
session_start();
require_once('../pdo/connect.php');

if (!isset(
    $_POST['name'],
    $_POST['description'],
    $_POST['type_1'],
    $_POST['type_2']
)) {
    http_response_code(400);
    exit(400);
}

$_POST['user'] = $_SESSION['user']['id'];
$_POST['time'] = time();

$sql = <<<TAG
INSERT INTO pokemon (id, name, description, user_id, type_id, type2_id, created_at)
VALUES (NULL, :name, :description, :user, :type_1, :type_2, :time)
TAG;
$stmt = $pdo->prepare($sql);
try {
    $stmt->execute($_POST);
} catch (PDOException $exception) {
    $_SESSION['PDOError'] = $exception;
    header('Location: /myPokemons.php');
}

unset($_SESSION['PDOError']);
header('Location: /myPokemons.php');

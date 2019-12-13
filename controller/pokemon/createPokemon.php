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
if ($_POST['type_2'] === '') {
    $_POST['type_2'] = 20; // Type "-----" in database
}

$sql = <<<TAG
INSERT INTO pokemon (id, name, description, user_id, type_id, type2_id, created_at)
VALUES (NULL, :name, :description, :user, :type_1, :type_2, :time)
TAG;
$stmt = $pdo->prepare($sql);

$stmt->execute($_POST);

unset($_SESSION['PDOError']);
header('Location: /myPokemons.php');

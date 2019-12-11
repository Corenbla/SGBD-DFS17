<?php

require_once('../pdo/connect.php');

$sql = "INSERT INTO pokemon (id, name, description, user_id, type_id, type2_id) VALUES (NULL, :name, :description, :user, :type_1, :type_2)";
$stmt = $pdo->prepare($sql);
try {
    $stmt->execute([
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'user' => intval($_POST['user']),
        'type_1' => $_POST['type_1'],
        'type_2' => $_POST['type_2'],
    ]);
} catch (PDOException $exception) {
    $_SESSION['PDOError'] = $exception;
    header('Location: /create.php?error');

}

header('Location: /pokedex.php');

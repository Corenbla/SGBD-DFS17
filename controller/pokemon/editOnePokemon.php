<?php
header('Content-Type: application/json');
session_start();
require_once('../pdo/connect.php');

if (!isset(
    $_POST['name'],
    $_POST['description'],
    $_POST['type_1'],
    $_POST['type_2'],
    $_POST['id']
)) {
    http_response_code(400);
    exit(400);
}

sanitizeArray($_POST);

$sql = <<<TAG
UPDATE pokemon p
SET 
    p.name = :name,
    p.description = :description,
    p.type_id = :type_id,
    p.type2_id = :type2_id
WHERE p.id = :id
TAG;

$stmt = $pdo->prepare($sql);
try {
    $stmt->execute(
        [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'type_id' => $_POST['type_1'],
            'type2_id' => $_POST['type_2'],
            'id' => $_POST['id'],
        ]
    );
} catch (PDOException $exception) {
    $_SESSION['PDOError'] = $exception;
}

echo json_encode('OK');
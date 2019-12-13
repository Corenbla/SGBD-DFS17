<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/controller/pdo/connect.php');

if (!isset($_POST['id'])) {
    http_response_code(400);
    exit(400);
}

$sql = <<<TAG
SELECT t.type, t2.type, p.name, p.description, p.color, p.type_id, p.type2_id
FROM pokemon p
INNER JOIN type t ON t.id = p.type_id
INNER JOIN type t2 ON t2.id = p.type2_id
WHERE p.id = :id
TAG;

$stmt = $pdo->prepare($sql);
try {
    $stmt->execute([
            'id' => $_POST['id'],
    ]);
} catch (PDOException $exception) {
    echo json_encode($exception->getMessage());
};

$pokemon = $stmt->fetch(PDO::FETCH_NAMED);

if (isset($_POST['ajax'])) {
    header('Content-Type: application/json');
    echo json_encode($pokemon);
}
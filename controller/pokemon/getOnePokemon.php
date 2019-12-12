<?php
require_once('/var/www/html/controller/pdo/connect.php');

if (!isset($_POST['id'])) {
    http_response_code(400);
    exit(400);
}

$sql = <<<TAG
SELECT type_id, type2_id, p.name, p.description
FROM pokemon p
WHERE p.id = :id
TAG;
$stmt = $pdo->prepare($sql);
try {
    $stmt->execute($_POST);
} catch (PDOException $exception) {
    echo json_encode($exception->getMessage());
};

$pokemon = $stmt->fetch(PDO::FETCH_NAMED);
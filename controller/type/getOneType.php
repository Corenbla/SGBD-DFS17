<?php
header('Content-Type: application/json');

require_once('/var/www/html/controller/pdo/connect.php');

if (!isset($_POST['id'])) {
    http_response_code(400);
    exit(400);
}

$sql = <<<TAG
SELECT type FROM type t
WHERE t.id = :id
TAG;
$stmt = $pdo->prepare($sql);
$stmt->execute($_POST);

$typeName = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($typeName);


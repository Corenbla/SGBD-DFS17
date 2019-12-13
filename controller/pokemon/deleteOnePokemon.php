<?php
header('Content-Type: application/json');

require_once('../pdo/connect.php');

//Theoretically, an admin could delete anyone's pokemon, but it's never used ...Yet
$sql = <<<TAG
DELETE p
FROM pokemon p
    LEFT JOIN
    user u ON p.user_id = u.id
WHERE (p.id = :id AND u.username = :username)
    OR (p.id = :id AND u.is_admin = 1);
TAG;

$stmt = $pdo->prepare($sql);
try {
    $stmt->execute($_POST);
} catch (PDOException $exception) {
    echo json_encode($exception->getMessage());
};

echo json_encode('OK');
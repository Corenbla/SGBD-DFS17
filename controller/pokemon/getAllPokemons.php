<?php

require_once('controller/pdo/connect.php');

$sql = <<<TAG
SELECT p.name, p.description, p.created_at, p.color, u.username, t.type, t2.type FROM pokemon p
INNER JOIN user u ON u.id = p.user_id
INNER JOIN type t ON t.id = p.type_id
INNER JOIN type t2 ON t2.id = p.type2_id
TAG;

$stmt = $pdo->prepare($sql);
$stmt->execute();

$allPokemons = $stmt->fetchAll(PDO::FETCH_NAMED);


<?php

require_once('controller/pdo/connect.php');

$sql = "SELECT * FROM type";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$allTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);


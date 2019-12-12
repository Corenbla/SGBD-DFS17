<?php

require_once('/var/www/html/controller/pdo/connect.php');

$sql = "SELECT * FROM type";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$allTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);


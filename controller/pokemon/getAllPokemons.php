<?php

require_once('controller/pdo/connect.php');

$sql = "SELECT * FROM pokemon";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$allPokemons = $stmt->fetchAll(PDO::FETCH_ASSOC);

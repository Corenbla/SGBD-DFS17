<?php
session_start();

require_once '../pdo/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die;
}

if ($_POST['username'] == '' || $_POST['password'] =='' ) {
    header('Location: /login.php?error');
}

$credentials = [
    'username' => $_POST['username'],
    'password' => md5($_POST['password']),
];
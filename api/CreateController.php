<?php

$host = 'MySQL-8.2';
$db   = 'mini_blog';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;password=$pass;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
$posts = $pdo->prepare("INSERT INTO posts (title, content, created_at) VALUES (?, ?, ?)");
$posts->execute([$_REQUEST['title'], $_REQUEST['content'], date('Y-m-d H:i:s')]);

header('Location:/index.php');
?>
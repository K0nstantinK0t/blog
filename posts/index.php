<?php

$host = 'MySQL-8.2';
$db   = 'mini_blog';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;password=$pass;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
$post = $pdo->prepare("SELECT * from posts WHERE id=?");
$post->execute([$_REQUEST['id']]);
$post = $post->fetch();

?>
<h1><?=$post['title']?></h1>
<p><?=$post['content']?></p>
<p><?=$post['created_at']?></p>



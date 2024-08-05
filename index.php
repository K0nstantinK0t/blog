<?php

$host = 'MySQL-8.2';
$db   = 'mini_blog';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;password=$pass;charset=$charset";
$pdo = new PDO($dsn, $user, $pass);
$posts = $pdo->prepare("SELECT id, title, created_at FROM posts ORDER BY created_at");
$posts->execute();
?>
    <h1>Добавить статью</h1>
        <form action="api/CreateController.php"  method="POST">
            <input type="text" name="title" placeholder="Заголовок">
            <textarea name="content">Содержание</textarea>
            <input type="submit" value="Добавить">
        </form>
<?php
foreach ($posts as $post) {?>
<!--        Изначально я хотел сделать ссылку на статью как posts/{id поста}, но оказалось что для этого нужно настривать nginx
             , поэтому я решил передавать id поста через get запрос-->
    <form action="/posts/index.php" method="GET" style="text-align: center">
        <input style="visibility: hidden" value="<?=$post['id']?>" name="id">
        <input style="
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;" type="submit" value="<?=$post['title'].' '. $post['created_at']?>">
    </form>
    <br />
<?php
}
?>


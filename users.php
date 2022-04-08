<?php
$host = 'localhost'; // имя хостач
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);

$query = "SELECT id FROM users ";
$result = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
foreach ($data as $item){
    ?> <a href="profile.php?id=<?=$item['id']?>">профиль номер <?=$item['id']?></a><br>
    <?php
}


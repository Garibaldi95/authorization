<?php
$host = 'localhost'; // имя хостач
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);

$profile_id = $_GET['id'];
$query = "SELECT * FROM users WHERE id = '$profile_id'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);
?>
<div>
    <h1><?= $user['name'] .  ' ' .  $user['surname']  ?></h1>
<p>
    age: <span class="age"><?= date('Y') - date('Y',strtotime($user['db'])) ?></span>

</p>
</div>




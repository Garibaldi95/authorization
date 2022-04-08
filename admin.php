<?php
session_start();
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);

$query = "SELECT id , login , status FROM users";
$result = mysqli_query($link, $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
$id = $_GET['id'];
if ($_SESSION['status'] == 'admin'){
    ?><table border="1">
    <tr>
        <th>login</th>
        <th>status</th>
        <th>info</th>
        <th>delete</th>
    </tr>

    <?
    foreach ($data as $elem) : ?>

        <tr>
            <th><?=$elem['login']?></th>
            <th><?=$elem['status']?></th>
            <th><a href="profile.php?id=<?=$elem['id']?>">данные  пользователя <?=$elem['id']?></a></th>
            <th><a href="admin.php?id=<?=$elem['id']?>">удаление  пользователя <?=$elem['id']?></a></th>
        </tr>
<?php
    endforeach;
    ?></table><?
    $query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($link, $query);
}
else echo 'net';
?>
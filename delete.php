<form action="" method="post">
    <p>пароль для подтверждения удаления</p>><input name="confirm">
    <input type="submit">
</form>
<?php
//удаляет текущего пользователя
session_start();
$host = 'localhost'; // имя хостач
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

$hash = $user['password']; // соленый пароль из БД

// Проверяем соответствие хеша из базы введенному старому паролю
if ($hash == md5($_POST['confirm'])) {
    $query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($link, $query);
}
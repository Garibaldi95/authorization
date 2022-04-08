<?php
//личный кабинет пользователя
session_start();
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);
$profile_id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id = '$profile_id'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

?>
<form action="" method="POST">
    <input name="name" value="<?= $user['name'] ?>">
    <input name="surname" value="<?= $user['surname'] ?>">
    <input type="submit" name="submit">
</form>
<?php
if (!empty($_POST['submit'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $query = "UPDATE users SET name='$name', surname='$surname' WHERE id='$profile_id'";
    mysqli_query($link, $query);
}
?>


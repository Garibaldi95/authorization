
<form action="" method="post">
    <p>введите логин</p><input name="login">
    <p>введите пароль</p><input name="password" type="password">
    <p>подтвердите пароль</p><input type="password" name="confirm">
    <p>введите имя</p><input name="name">
    <p>введите фамилию</p><input name="surname">
    <p>введите дату рождения</p><input type="date" name="db">
    <input type="submit">
</form>

<?php
//страница регистрации
session_start();
$host = 'localhost'; // имя хостач
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);



if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
    if ($_POST['password'] == $_POST['confirm']) {
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $user_name = $_POST['name'];
            $surname = $_POST['surname'];
            $db = $_POST['db'];

            $query = "SELECT * FROM users WHERE login='$login'";
            $user = mysqli_fetch_assoc(mysqli_query($link, $query));
            if (empty($user) && strlen($login) > 3 && strlen($password > 3)) {
                $query = "INSERT into users SET login = '$login' ,password = '$password' , name = '$user_name' , surname = '$surname' , db = '$db' , status = 'user'";
                mysqli_query($link, $query);
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $login;
            }
            else echo 'zanyato';

        }
    } else echo 'неверно пароль ввели';



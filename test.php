

<form action="" method="post">
    <p>введите логин</p><input name="login">
    <p>введите пароль</p><input name="password" type="password">
    <input type="submit">
</form>
<?php
//страница авторизации

$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'mydb';      // имя базы данных

$link = mysqli_connect($host,$user,$pass,$name);


	session_start();

	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = md5($_POST['password']);

		$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);

		if (!empty($user)) {
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $user['id'];
			$_SESSION['status'] = $user['status'];

		} else {
			echo 'неверно';
		}
	}
?>
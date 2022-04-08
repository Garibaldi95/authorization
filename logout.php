//обнуляет текущую авторизацию

<?php
session_start();
$_SESSION['auth'] = null;
$_SESSION['id'] = null;
$_SESSION['status'] = null;

header('Location: test.php');

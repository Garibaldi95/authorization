<?php
//показывает текущего авторизованного пользователя
session_start();
if (!empty($_SESSION['auth'])) {
    echo $_SESSION['login'];
}
else {?><a href="test.php">ssylka</a>
<?php }
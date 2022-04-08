<!DOCTYPE html>
<html>
<head>

</head>
<body>
<p>текст для любого пользователя</p>
<?php
session_start();
if (!empty($_SESSION['auth']) and  $_SESSION['status'] == 'admin') {
    echo 'текст только для админа';
}
?>
<p>текст для любого пользователя</p>
</body>
</html>
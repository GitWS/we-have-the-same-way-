<?php
define("HOST","127.0.0.1");
define("DATABASE","ws_database");
define("USER","root"); //sony
define("PASSWORD",""); //root

$connect = mysqli_connect(HOST,USER,PASSWORD) or die("Ошибка подключения к серверу");
$bd = mysqli_select_db($connect,DATABASE) or die(' База данных не найдена или отсутствует доступ.');
?>
<title>Главная</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="./script/jquery-3.1.1.min.js"></script>
<?php  
	define("HOST","10.10.14.181");
	define("DATABASE","ws_database");
	define("USER","sony"); //sony
	define("PASSWORD","root"); //root

	$connect = mysqli_connect(HOST,USER,PASSWORD) or die("Ошибка подключения к серверу");
	$bd = mysqli_select_db($connect,DATABASE) or die(' База данных не найдена или отсутствует доступ.');
?>
<?php require_once ("./script/session_user.php") ?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once ("blocks/head.php") ?>
	<?php 
	require_once ("script/config.php");
	$connect = mysqli_connect(HOST,USER,PASSWORD) or die("Ошибка подключения к серверу");
	$bd = mysqli_select_db($connect,DATABASE) or die(' База данных не найдена или отсутствует доступ.');
	?>
</head>
<body>


<!-- Шапка -->

<?php require_once("blocks/header.php") ?>

<!-- Блок -->

<div id="wrapper">
	<div id="content">
		Основной блок!
	</div>
	<div id="right">
		Фильтры
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>
</html>
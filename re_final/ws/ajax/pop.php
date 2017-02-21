<?php
	session_start();
	define("HOST","localhost");
	define("DATABASE","ws");
	define("USER","root"); //sony
	define("PASSWORD",""); //root

	//$_GET['day'];

	$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");

	$types = 1;
	$name = "";
	$phone = "";
	$id = $_GET['id'];

	$select_id_info = mysqli_prepare($connect,"select table_profile.name, table_profile.phone from table_profile, table_uesr where login = ?;");
	mysqli_stmt_bind_param($select_id_info,'s',$_SESSION['LOGIN']);
	mysqli_stmt_execute($select_id_info);
	mysqli_stmt_bind_result($select_id_info, $name, $phone);
	mysqli_stmt_fetch($select_id_info);
	mysqli_stmt_close($select_id_info);

	$update_sql = mysqli_query($connect,"UPDATE table_order SET yes_no=".$types.", name_pop=\"".$name."\", phone_pop=\"".$phone."\" WHERE id=".$id.";");

	echo $types+"<br>";
	echo $name+"<br>";
	echo $phone+"<br>";
	echo $id+"<br>";
	echo $day+"<br>";

	header ('Location: ../index.php');  // перенаправление на нужную страницу
   	exit();    // прерываем работу скрипта, чтобы забыл о прошлом
?>
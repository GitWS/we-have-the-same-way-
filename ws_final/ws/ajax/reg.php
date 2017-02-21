<?php
	define("HOST","127.0.0.1");
	define("DATABASE","ws");
	define("USER","root"); //sony
	define("PASSWORD",""); //root

	$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");

	$login = htmlspecialchars($_GET['login']);
	$password = htmlspecialchars($_GET['password']);
	$name = htmlspecialchars($_GET['name']);
	$gender = htmlspecialchars($_GET['gender']);
	$age = (int)$_GET['age'];
	$phone = htmlspecialchars($_GET['phone']);
	$type = $_GET['type'];
	$car = htmlspecialchars($_GET['car']);

	$profile_insert = mysqli_prepare($connect,"insert into table_profile (name,phone,type,gender,age,car) values(?,?,?,?,?,?);");
	mysqli_stmt_bind_param($profile_insert,'ssisis',$name,$phone,$type,$gender,$age,$car);
	mysqli_stmt_execute($profile_insert);
	mysqli_stmt_close($profile_insert);

	$select_id = mysqli_prepare($connect,"select max(id) from table_profile;");
	mysqli_stmt_execute($select_id);
	mysqli_stmt_bind_result($select_id, $id); //Получение значений.
	mysqli_stmt_fetch($select_id);
	mysqli_stmt_close($select_id);

	$user_insert = mysqli_prepare($connect,"insert into table_uesr (login,pass,profile_id) values(?,?,?);");
	mysqli_stmt_bind_param($user_insert,'ssi',$login,$password,$id);
	mysqli_stmt_execute($user_insert);
	mysqli_stmt_close($user_insert);

	mysqli_close($connect);
	echo "Регистрация завершена!";
?>
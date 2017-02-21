<?php
	session_start();
	define("HOST","localhost");
	define("DATABASE","ws");
	define("USER","root"); //sony
	define("PASSWORD",""); //root

	$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");

	$date = $_GET['date'];
	$name = htmlspecialchars($_GET['name']);
	$time = $_GET['time'];
	$gender = $_GET['gender'];
	$mOUT = htmlspecialchars($_GET['mOUT']);
	$age = $_GET['age'];
	$mIN = htmlspecialchars($_GET['mIN']);
	$mark = htmlspecialchars($_GET['mark']);
	$money = $_GET['money'];
	$phone = htmlspecialchars($_GET['phone']);
	$comment = htmlspecialchars($_GET['comment']);

	$id_user_info=0;
	$id_info=0;
	$id_user=0;

	$insert_order_info = mysqli_prepare($connect,"insert into table_order_info(date_go,time_go,start,final,money) values(?,?,?,?,?);");
	mysqli_stmt_bind_param($insert_order_info,'ssssi',$date,$time,$mOUT,$mIN,$money);
	mysqli_stmt_execute($insert_order_info);
	mysqli_stmt_close($insert_order_info);

	$select_id_info = mysqli_prepare($connect,"select max(id) from table_order_info;");
	mysqli_stmt_execute($select_id_info);
	mysqli_stmt_bind_result($select_id_info, $id_info);
	mysqli_stmt_fetch($select_id_info);
	mysqli_stmt_close($select_id_info);

	$insert_user_info = mysqli_prepare($connect,"insert into table_order_user_info(name,gender,age,car,phone) values(?,?,?,?,?);");
	mysqli_stmt_bind_param($insert_user_info,'ssiss',$name,$gender,$age,$mark,$phone);
	mysqli_stmt_execute($insert_user_info);
	mysqli_stmt_close($insert_user_info);

	$select_id_user_info = mysqli_prepare($connect,"select max(id) from table_order_user_info;");
	mysqli_stmt_execute($select_id_user_info);
	mysqli_stmt_bind_result($select_id_user_info, $id_user_info);
	mysqli_stmt_fetch($select_id_user_info);
	mysqli_stmt_close($select_id_user_info);

	$select_id = mysqli_prepare($connect,"select id from table_uesr where login = ? and pass = ?;");
	mysqli_stmt_bind_param($select_id,'ss',$_SESSION['LOGIN'],$_SESSION['PASSWORD']);
	mysqli_stmt_execute($select_id);
	mysqli_stmt_bind_result($select_id, $id_user);
	mysqli_stmt_fetch($select_id);
	mysqli_stmt_close($select_id);

	$type = 1;
	$yes_no = 0;

	$insert_order = mysqli_prepare($connect,"insert into table_order(user_id,order_user_id,order_info_id,comment,type_order,yes_no) values(?,?,?,?,?,?);");
	mysqli_stmt_bind_param($insert_order,'iiisii',$id_user,$id_user_info,$id_info,$comment,$type,$yes_no);
	mysqli_stmt_execute($insert_order);
	mysqli_stmt_close($insert_order);

	mysqli_close($connect);
	echo "Ваще предложение создано";
?>
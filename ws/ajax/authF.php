<?php  
	$log = htmlspecialchars($_POST['login']);
	$pas = htmlspecialchars($_POST['pas']);
	
	#...

	$host='10.10.14.181';
	$database='karpriding';
	$user='sony';
	$password='root';

	$con = mysqli_connect($host, $user, $password) or die('Ошибка подключения к серверу баз данных.');
	$selected = mysqli_select_db($con,$database) or die(' База данных не найдена или отсутствует доступ.');

	$query = "call auth(\"".iconv("UTF-8", "windows-1251", $log)."\",\"".iconv("UTF-8", "windows-1251", $pas)."\",@result);";

	$result = mysqli_query($con, $query);
	$res_select = mysqli_query($con, "select @result;");

	while($row= mysqli_fetch_row($res_select)){
		$res_query = $row[0];
	}

	if($res_query == 1){
		echo 'Вы авторизировались!';
		session_start();
		$_SESSION['LoginUser'] = $log;
		$_SESSION['Connect'] = 1;
	}
	else
		echo 'Произошла ошибка!';
?>
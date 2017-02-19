<?php
	require_once ("./script/config.php");

	$login = iconv("UTF-8", "windows-1251",htmlspecialchars($_POST['login']));
	$password = iconv("UTF-8", "windows-1251",htmlspecialchars($_POST['password']));
	$name = iconv("UTF-8", "windows-1251",htmlspecialchars($_POST['name']));
	$gender = iconv("UTF-8", "windows-1251",htmlspecialchars($_POST['gender']));
	$age = iconv("UTF-8", "windows-1251",htmlspecialchars($_POST['age']));
	$phone = iconv("UTF-8", "windows-1251"htmlspecialchars($_POST['phone']));
	$type = $_POST['type'];
	$car = iconv("UTF-8", "windows-1251",htmlspecialchars($_POST['car']));

	$query = "call reg_new(\"".$login."\",\"".$password."\",".(int)$type.");";

	if(!($result = mysqli_query($connect, $query))){
		echo "Ошибка при запросе: ".mysqli_error();
	}

	//$res_select = mysqli_query($con, "select @result;");

	/*while($row= mysqli_fetch_row($res_select)){
		$res_query = $row[0];
	}*/

	/*if($res_query == 1){
		echo 'Вы авторизировались!';
		session_start();
		$_SESSION['LoginUser'] = $log;
		$_SESSION['Connect'] = 1;
	}
	else
		echo 'Произошла ошибка!';*/
?>
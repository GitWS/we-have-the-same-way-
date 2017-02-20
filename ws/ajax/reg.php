<?php
	define("HOST","10.10.14.181");
	define("DATABASE","ws_database");
	define("USER","sony"); //sony
	define("PASSWORD","root"); //root

	$connect = mysqli_connect(HOST,USER,PASSWORD) or die("Ошибка подключения к серверу");
	$bd = mysqli_select_db($connect,DATABASE) or die(' База данных не найдена или отсутствует доступ.');

	$login = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['login']));
	$password = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['password']));
	$name = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['name']));
	$gender = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['gender']));
	$age = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['age']));
	$phone = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['phone']));
	$type = $_GET['type'];
	$car = iconv("UTF-8", "windows-1251",htmlspecialchars($_GET['car']));

	$query = "call reg_new(\"".$login."\",\"".$password."\",".$type.");";
	$result = mysqli_query($connect,$query);

	$query_auth = "call auth(\"".$login."\",\"".$password."\",@result);";
	$result_auth = mysqli_query($connect,$query_auth);

	$query_res = "select @result;";
	$result_auth_select = mysqli_query($connect,$query_res);

	while($row= mysqli_fetch_row($result_auth_select))
		$res_query = $row[0];
	
	if ((int)$res_query == 1) {
		/*$query_to_profile = "call create_profile('".$login."','".$name."','".$phone."','".$age."','".$gender."','".$car."');";
		$result_profile = mysqli_query($connect,$query_to_profile);*/
		echo "Регистрация прошла успешно!";
	} else {
		echo "Ошибка регестрации!";
	}
?>
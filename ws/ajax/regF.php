<?php  
	$log = htmlspecialchars($_POST['login']);
	$pas = htmlspecialchars($_POST['pas']);
	$email = htmlspecialchars($_POST['email']);
	$phone = htmlspecialchars($_POST['tel']);
	
	#...

	$host='10.10.14.181';
	$database='karpriding';
	$user='sony';
	$password='root';

	$con = mysqli_connect($host, $user, $password) or die('Ошибка подключения к серверу баз данных.');
	$selected = mysqli_select_db($con,$database) or die(' База данных не найдена или отсутствует доступ.');

	$query = "call regthis(\"".iconv("UTF-8", "windows-1251", $log)."\",\"".iconv("UTF-8", "windows-1251", $pas)."\",\"".iconv("UTF-8", "windows-1251", $email)."\",\"".iconv("UTF-8", "windows-1251", $phone)."\");";

	$result = mysqli_query($con, $query);

	$query2 = "call auth(\"".iconv("UTF-8", "windows-1251", $log)."\",\"".iconv("UTF-8", "windows-1251", $pas)."\",@result);";

	$result2 = mysqli_query($con, $query2);
	$res_select = mysqli_query($con, "select @result;");

	while($row= mysqli_fetch_row($res_select)){
		$res_query = $row[0];
	}

	if($res_query == 1){
		echo 'Вы успешно зарегистрировались!';
	}
	else
		echo 'Произошла ошибка!';
?>
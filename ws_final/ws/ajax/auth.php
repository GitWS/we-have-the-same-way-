<?php
	define("HOST","10.10.14.181");
	define("DATABASE","ws");
	define("USER","sony"); //sony
	define("PASSWORD","root"); //root
	$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");

	$login = htmlspecialchars($_GET['login']);
	$password = htmlspecialchars($_GET['password']);

	$id_type=0;

	$user_select = mysqli_prepare($connect,"select a.type from table_profile a, table_uesr b where a.id = b.profile_id and b.login = ? and b.pass = ?;");
	mysqli_stmt_bind_param($user_select,'ss',$login,$password);
	mysqli_stmt_execute($user_select);
	mysqli_stmt_bind_result($user_select, $id_type);
	mysqli_stmt_fetch($user_select);
	mysqli_stmt_close($user_select);
	mysqli_close($connect);


	if((int)$id_type != 0){
		session_start();
		if(!isset($_SESSION['LOGIN'])){
			$_SESSION['LOGIN'] = $login;
		}else{
			unset($_SESSION['LOGIN']);
			$_SESSION['LOGIN'] = $login;
		}
		if(!isset($_SESSION['PASSWORD'])){
			$_SESSION['PASSWORD'] = $password;
		}else{
			unset($_SESSION['PASSWORD']);
			$_SESSION['PASSWORD'] = $password;
		}
		if(!isset($_SESSION['CONNECT'])){
			$_SESSION['CONNECT'] = 1;
		}else{
			unset($_SESSION['CONNECT']);
			$_SESSION['CONNECT'] = 1;
		}
		if(!isset($_SESSION['TYPE'])){
			$_SESSION['TYPE'] = $id_type;
		}else{
			unset($_SESSION['TYPE']);
			$_SESSION['TYPE'] = $id_type;
		}
		echo "<script type=\"text/javascript\">alert(\"Добро пожпловать!\");</script>";
	} else {
		echo "<script type=\"text/javascript\">alert(\"Пользователь не найден!\");</script>";
	}
?>
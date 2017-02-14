<header>
	<div id="logo">
		<center><a href="./index.php">Нам по пути!</a></center>
	</div>
	<div id="menu">
		Меню
	</div>
	<?php
		session_start();
		if(isset($_SESSION['Connect']) && $_SESSION['Connect'] == 1){
			echo "<div id=\"RegAuto\">Логин: ".$_SESSION['LoginUser']." | <a onclick=\"relog();\">Выход</a></div>";
		} else {
			echo "<div id=\"RegAuto\"><a href=\"./auth.php\">Авторизация </a><a href=\"./reg.php\"> Регистрация</a></div>";
		}
	?>
</header>
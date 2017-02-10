<header>
	<div id="logo">
		<center><a href="./index.php">Нам по пути!</a></center>
	</div>
	<div id="menu">
		Меню
	</div>
	<?php
		session_start();
		if(isset($_SESSION['Connect'])){
			echo "<div id=\"RegAuto\">Добрый день ".$_SESSION['LoginUser']."</div>";
		} else {
			echo "<div id=\"RegAuto\"><a href=\"./auth.php\">Авторизация </a><a href=\"./reg.php\"> Регистрация</a></div>";
		}
	?>
	<div id="RegAuto">
		<a href="./auth.php">Авторизация</a>
		<a href="./reg.php">Регистрация</a>
	</div>
</header>
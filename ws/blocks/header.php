<header>
	<div id="logo">
		<center><a href="./index.php">Нам по пути!</a></center>
	</div>
	<div id="menu">
		<?php 
		session_start();
		if(isset($_SESSION['Connect']) && $_SESSION['Connect'] == 1){
			echo "<a href=\"./predloz.php\">Предложения</a> <a href=\"./zayvka.php\">Заявки</a>";
		} else {
			echo "Для получения функций авторизируйтесь!";
		}
		?>
	</div>
	<?php
		if(isset($_SESSION['Connect']) && $_SESSION['Connect'] == 1){
			echo "<div id=\"RegAuto\">Логин: ".$_SESSION['LoginUser']." | <a onclick=\"relog();\">Выход</a></div>";
		} else {
			echo "<div id=\"RegAuto\"><a href=\"./auth.php\">Авторизация </a><a href=\"./reg.php\"> Регистрация</a></div>";
		}
	?>
</header>
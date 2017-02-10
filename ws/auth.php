<!DOCTYPE html>
<html>
<head>
	<?php require_once ("blocks/head.php") ?>
</head>
<body>


<!-- Шапка -->

<?php require_once("blocks/header.php") ?>

<!-- Блок -->

<div id="wrapper">
	<div id="content">
		<center>
		<form id="auth">
			<fieldset>
				<legend>Авторизация</legend>
				<table>
					<tr>
						<td><label>Логин:</label></td>
						<td><input type="text" name="log" max="20" maxlength="20" id="logAuth"></td>
					</tr>
					<tr>
						<td><label>Пароль:</label></td>
						<td><input type="password" name="pas" max="20" maxlength="20" id="pasAuth"></td>
					</tr>
					<tr>
						<td><button onclick="auth();">Авторизироваться</button></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</center>
	</div>
	<div id="right">
		
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>
</html>
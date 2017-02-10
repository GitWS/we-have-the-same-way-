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
		<form id="reg">
			<fieldset>
				<legend>Регистрация</legend>
				<table>
					<tr>
						<td><label>Логин:</label></td>
						<td><input type="text" name="log" max="20" maxlength="20" id="logReg"></td>
					</tr>
					<tr>
						<td><label>Пароль:</label></td>
						<td><input type="password" name="pas" max="20" maxlength="20" id="pasReg"></td>
					</tr>
					<tr>
						<td><label>Email:</label></td>
						<td><input type="text" name="log" max="20" maxlength="20" id="emailReg"></td>
					</tr>
					<tr>
						<td><label>Телефон:</label></td>
						<td><input type="text" name="log" max="20" maxlength="20" id="telReg"></td>
					</tr>
					<tr>
						<td><button onclick="reg();">Зарегистрироваться</button></td>
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
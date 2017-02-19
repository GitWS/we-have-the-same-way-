<!DOCTYPE html>
<html>
<head>
	<?php require_once ("blocks/head.php") ?>
	<?php 
	require_once ("script/config.php");
	?>
</head>
<body>


<!-- Шапка -->

<?php require_once("blocks/header.php") ?>

<!-- Блок -->

<div id="wrapper">
	<div id="content">
		<form>
			<fieldset>
				<legend>Авторизация пользователя</legend>

				<table>
					<tr>
						<td><label>Логин:</label></td>
						<td><input type="text" name="login"></td>
					</tr>
					<tr>
						<td><label>Пароль:</label></td>
						<td><input type="password" name="password"></td>
					</tr>
				</table>
				<button id="accept">Авторизироваться</button>
			</fieldset>
		</form>
	</div>
	<div id="right">
		Фильтры
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>

<script type="text/javascript">
	$("#wrapper #content #accept").click(function(){
		var login = $("input[name=login]").val();
		var password = $("input[name=password]").val();
		alert("Логин:"+login+"\n"+"Пароль:"+password+"\nАвторизация пройдена!");
	});
</script>

</html>
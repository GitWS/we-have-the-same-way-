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
		Для получения функций фильтров вернитесь на главную страницу.
		Для этого нажмите на Нам по пути! в левом верхнем углу.
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>

<script type="text/javascript">
	$("#wrapper #content #accept").click(function(){
		var login = $("input[name=login]").val();
		var password = $("input[name=password]").val();
		//alert("Логин:"+login+"\n"+"Пароль:"+password+"\nАвторизация пройдена!");
		$.ajax({
			url: 'ajax/auth.php',
			type: 'GET',
			cache: false,
			data: {'login': login, 'password':password},
			dataType: 'html',
			success: function (data){
				alert(data);
			},
			complete: function (){
				location.href = "index.php";
			}
		});
	});
</script>

</html>
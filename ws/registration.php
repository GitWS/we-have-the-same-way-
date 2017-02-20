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
		<form id="infoRegistration">
			<fieldset>
				<legend>Регистрация</legend>

				<table>
					<tr>
						<td><label>Логин:</label></td>
						<td><input type="text" name="login"></td>
					</tr>
					<tr>
						<td><label>Пароль:</label></td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td><label>Имя:</label></td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td><label>Номер телефона:</label></td>
						<td><input type="text" name="phone"></td>
					</tr>
					<tr>
						<td><label>Кем вы являетесь:</label></td>
						<td>
							<input type="radio" name="type" value="0" checked>Водитель
							<input type="radio" name="type" value="1">Пассажир
   						</td>
					</tr>
					<tr id="pol">
						<td><label>Пол:</label></td>
						<td>
							<select name="gender">
								<option>Мужчина</option>
								<option>Женщина</option>
							</select>
						</td>
					</tr>
					<tr id="ages">
						<td><label>Возраст:</label></td>
						<td><input type="text" name="age"></td>
					</tr>
					<tr id="car">
						<td><label>Марка машины:</label></td>
						<td><input type="text" name="car"></td>
					</tr>
				</table>
				<button id="accept">Зарегестрироваться</button>
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
	$("input[name=type]").click(function(){
		if(Number($("input[name=type]:checked").val()) == 1){
			$("#wrapper #content #infoRegistration #car").hide();
			$("#wrapper #content #infoRegistration #pol").hide();
			$("#wrapper #content #infoRegistration #ages").hide();
		} else {
			$("#wrapper #content #infoRegistration #car").show();
			$("#wrapper #content #infoRegistration #pol").show();
			$("#wrapper #content #infoRegistration #ages").show();
		}
	});
	$("#wrapper #content #infoRegistration #accept").click(function(){
		var login = $("input[name=login]").val();
		var password = $("input[name=password]").val();
		var name = $("input[name=name]").val();
		var gender = $("select[name=gender]").val();
		var age = $("input[name=age]").val();
		var phone = $("input[name=phone]").val();
		var type = $("input[name=type]:checked").val();
		var car = $("input[name=car]").val();
		//alert("Логин:"+login+"\n"+"Пароль:"+password+"\n"+"Имя:"+name+"\n"+"Пол:"+gender+"\n"+"Возраст:"+age+"\n"+"Номер телефона:"+phone+"\n"+"Тип:"+type+"\n"+"Марка машины:"+car+"\nРегистрация пройдена!");
		$.ajax({
		url: 'ajax/reg.php',
		type: 'GET',
		cache: false,
		data: {'login': login, 'password':password, 'name':name, 'gender':gender, 'age':age, 'phone':phone, 'type':type, 'car':car},
		dataType: 'html',
		success: function(data){
			alert(data);
		}
	});
	});
</script>

</html>
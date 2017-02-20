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
				<legend>Добавление предложения</legend>
				<table>
					<tr>
						<td>Дата отъезда:</td>
						<td><input type="date" name="date"></td>
						<td>Имя:</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Время отъезда:</td>
						<td><input type="time" name="time"></td>
						<td>Пол:</td>
						<td>
							<select name="gender">
								<option>Мужчина</option>
								<option>Женщина</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Место назначения:</td>
						<td><input type="text" name="mOUT"></td>
						<td>Возраст:</td>
						<td><input type="text" name="age"></td>
					</tr>
					<tr>
						<td>Место отъезда:</td>
						<td><input type="text" name="mIN"></td>
						<td>Марка машины:</td>
						<td><input type="text" name="mark"></td>
					</tr>
					<tr>
						<td>Стоимость:</td>
						<td><input type="text" name="money"></td>
						<td>Номер телефона:</td>
						<td><input type="text" name="phone"></td>
					</tr>
				</table>
				Коментарий:<br>
				<textarea cols="85" rows="10" wrap="physical" name="comment"></textarea><br>
				<button class="addButton">Добавить</button>
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
	$(".addButton").click(function(){
		var date = $("input[name=date]").val();
		var name = $("input[name=name]").val();
		var time = $("input[name=time]").val();
		var gender = $("select[name=gender]").val();
		var mOUT = $("input[name=mOUT]").val();
		var age = $("input[name=age]").val();
		var mIN = $("input[name=mIN]").val();
		var mark = $("input[name=mark]").val();
		var money = $("input[name=money]").val();
		var phone = $("input[name=phone]").val();
		var comment = $("textarea[name=comment]").val();
		alert(date+" "+name+"\n"+time+" "+gender+"\n"+mOUT+" "+age+"\n"+mIN+" "+mark+"\n"+money+" "+phone+"\n"+comment);
	});
</script>
</html>
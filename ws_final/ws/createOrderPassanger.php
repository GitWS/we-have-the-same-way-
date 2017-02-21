<!DOCTYPE html>
<html>
<head>
	<?php require_once ("blocks/head.php") ?>
</head>
<body>


<!-- Шапка -->

<?php require_once("blocks/header.php") ?>
	<?php
		$name = "";
		$phone = "";
		$type = 1;
		$gender = "";
		$age = 0;
		$car = "";

		$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");

		$select_profile= mysqli_prepare($connect,"select a.name, a.phone, a.gender, a.age, a.car from table_profile a, table_uesr b where a.id = b.profile_id and b.login = ? and b.pass = ?;");
		mysqli_stmt_bind_param($select_profile,'ss',$_SESSION['LOGIN'],$_SESSION['PASSWORD']);
		mysqli_stmt_execute($select_profile);
		mysqli_stmt_bind_result($select_profile, $name, $phone, $gender, $age, $car); //Получение значений.
		mysqli_stmt_fetch($select_profile);
		mysqli_stmt_close($select_profile);

		mysqli_close($connect);
	?>

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
						<?php echo "<td><input type=\"text\" name=\"name\" value=\"".$name."\"></td>"; ?>
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
						<?php echo "<td><input type=\"text\" name=\"age\" value=\"".$age."\"></td>"; ?>
					</tr>
					<tr>
						<td>Место отъезда:</td>
						<td><input type="text" name="mIN"></td>
						<td>Марка машины:</td>
						<?php echo "<td><input type=\"text\" name=\"mark\" value=\"".$car."\"></td>"; ?>
					</tr>
					<tr>
						<td>Стоимость:</td>
						<td><input type="text" name="money"></td>
						<td>Номер телефона:</td>
						<?php echo "<td><input type=\"text\" name=\"phone\" value=\"".$phone."\"></td>"; ?>
					</tr>
				</table>
				Коментарий:<br>
				<textarea cols="85" rows="10" wrap="physical" name="comment"></textarea><br>
				<button class="addButton">Добавить</button>
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
		$.ajax({
			url: 'ajax/createOrderDriver.php',
			type: 'GET',
			cache: false,
			data: {'date': date, 'name':name, 'time':time, 'gender':gender, 'mOUT':mOUT, 'age':age, 'mIN':mIN, 'mark':mark, 'money':money,'phone':phone, 'comment':comment},
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
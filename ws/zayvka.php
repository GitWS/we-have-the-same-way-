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

	</div>
	<div id="right">
		<center>Меню Функций:</center>
		<hr>
		<form id="createOrder">
			<fieldset>
				<legend>Создание заявки</legend>
				<table>
					<tr>
						<td>ФИО Пассажира:</td>
						<td><input type="text" name="" id="zavFIO"></td>
					</tr>
					<tr>
						<td>Откуда:</td>
						<td><input type="text" name="" id="zavIN"></td>
					</tr>
					<tr>
						<td>Куда:</td>
						<td><input type="text" name="" id="zavOUT"></td>
					</tr>
					<tr>
						<td>Дата поездки:</td>
						<td><input type="date" name="" id="zavDate"></td>
					</tr>
					<tr>
						<td>Нужно мест:</td>
						<td><input type="text" name="" id="zavCount"></td>
					</tr>
					<tr>
						<td>Информация о пассажире:</td>
						<td><input type="text" name="" id="zavInfo"></td>
					</tr>
				</table>
				<center><button onclick="">Создать</button></center>
			</fieldset>
		</form>
		<br>
		<hr>
		<center>Фильтры</center>
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>
</html>
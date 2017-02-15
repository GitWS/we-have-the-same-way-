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
				<legend>Создание предложения</legend>
				<table>
					<tr>
						<td>ФИО водителя:</td>
						<td><input type="text" name="" id="orderFIO"></td>
					</tr>
					<tr>
						<td>Откуда:</td>
						<td><input type="text" name="" id="orderIN"></td>
					</tr>
					<tr>
						<td>Куда:</td>
						<td><input type="text" name="" id="orderOUT"></td>
					</tr>
					<tr>
						<td>Дата поездки:</td>
						<td><input type="text" name="" id="orderDate"></td>
					</tr>
					<tr>
						<td>Машина:</td>
						<td><input type="text" name="" id="orderCart"></td>
					</tr>
					<tr>
						<td>Свободных мест:</td>
						<td><input type="text" name="" id="orderCount"></td>
					</tr>
					<tr>
						<td>Информация о поездке:</td>
						<td><input type="text" name="" id="orderInfo"></td>
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
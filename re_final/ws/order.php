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
		<?php

			$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");

			$result = mysqli_query($connect,"select * from orders where add_order=\"".$_GET['date_time_add']."\";");

			while ($row = mysqli_fetch_row($result)) {
				echo "<div class=\"order\">";
				echo "<form>";
				echo "<fieldset>";
				echo "<legend>Предложение от ".$row[10]."</legend>";
				echo "<label>Пол автора: ".$row[6]."</label><br>";
				echo "<label>Поездка из ".$row[2]." в ".$row[3]."</label><br>";
				echo "<label>Дата поездки: ".$row[0]."</label><br>";
				echo "<label>Время начала поездки: ".$row[1]."</label><br>";
				echo "<label>Стоимость поездки: ".$row[4]."</label><br>";
				echo "<label>Имя водителя: ".$row[5]."</label><br>";
				echo "<label>Возраст водителя: ".$row[7]."</label><br>";
				echo "<label>Марка машины: ".$row[8]."</label><br>";
				echo "<label>Номер водителя: ".$row[9]."</label><br>";
				echo "<label>Коментарий к поездке: ".$row[11]."</label><br>";
				echo "</fieldset>";
				echo "</form>";
				echo "</div>";
			}
		?>
	</div>
	<div id="right">
		Для получения функций фильтров вернитесь на главную страницу.
		Для этого нажмите на Нам по пути! в левом верхнем углу.
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>
</html>
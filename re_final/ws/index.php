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
		<?php echo "<script type=\"text/javascript\">$(\"#wrapper #content\").height(1);</script>"; ?>
		<?php 
			//125

			$connect = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Ошибка подключения к серверу");
			if((int)$_SESSION['FILTER'] == 0){
				$result = mysqli_query($connect,"select * from orders where date_go>=\"".date('Y-m-d')."\";");
			}
			if((int)$_SESSION['FILTER'] == 1){
				$result = mysqli_query($connect,"select * from orders where gender=\"Мужчина\" and date_go>=\"".date('Y-m-d')."\";");
			}
			if((int)$_SESSION['FILTER'] == 2) {
				$result = mysqli_query($connect,"select * from orders where gender=\"Женщина\" and date_go>=\"".date('Y-m-d')."\";");
			}

			while ($row = mysqli_fetch_row($result)) {
				if($row[12] == 1){
					$type_order="Водитель";
				} else {
					$type_order="Пассажир";
				}
				echo "<script type=\"text/javascript\">$(\"#wrapper #content\").height($(\"#wrapper #content\").height()+155);</script>";
				echo "<div class=\"order\">";
				echo "<form>";
				echo "<fieldset>";
				echo "<legend>Предложение от ".$row[10].", (".$type_order.")</legend>";
				echo "<label>Пол автора: (".$row[6].")</label><br>";
				echo "<label>Поездка из ".$row[2]." в ".$row[3]."</label><br>";
				echo "<label><a href=\"order.php?date_time_add=".$row[13]."\">Подробнее....</a></label><br>";
				if((int)$row[14] == 0 and isset($_SESSION['CONNECT'])){
					echo "<button><a style=\"color: white;\" href=\"ajax/pop.php?id=".$row[17]."\">Подписатся на поездку</a></button>";
				}
				echo "</fieldset>";
				echo "</form>";
				echo "</div>";
			}


			$pops = -1;
			$pops_id = -1;
			$pops_count = -1;
			$popular_user = "";
			
			$result_popular = mysqli_query($connect,"select user_id, count(*) from table_order group by user_id;");
			while ($row = mysqli_fetch_row($result_popular)) {
				if($pops == -1){
					$pops_id = (int)$row[0];
					$pops_count = (int)$row[1];
					$pops = 0;
				} else {
					if($pops_count < (int)$row[1]){
						$pops_id = (int)$row[0];
						$pops_count = (int)$row[1];
					}
				}
			}
			$result_popular2 = mysqli_query($connect,"select login from table_uesr where id = ".$pops_id.";");
			while ($row = mysqli_fetch_row($result_popular2)) {
				$popular_user = (string)$row[0];
			}
		?>
	</div>
	<div id="right">
		<div class="filter">
			<form>
				<fieldset>
					<legend>Фильтры</legend>
					<label>Пол водителя:</label><br>
					<input type="radio" name="fill_type" value="0" <?php if((int)$_SESSION['FILTER'] == 0) echo "checked"; ?>>Все<br>
					<input type="radio" name="fill_type" value="1" <?php if((int)$_SESSION['FILTER'] == 1) echo "checked"; ?>>Мужчина<br>
					<input type="radio" name="fill_type" value="2" <?php if((int)$_SESSION['FILTER'] == 2) echo "checked"; ?>>Женщина
				</fieldset>
			</form>
			<form>
				<fieldset>
					<legend>Предложения</legend>
					<label>Самое большое кол-во предложений у пользователя: <?php echo $popular_user; ?></label>
				</fieldset>
			</form>
		</div>
		<div class="no_filter">
			Дорогой пользователь Нам по пути, пока вы не авторизированы вы ограничены в функциях нашего сервиса, для получения дополнительного функционала просим вас зарегестрироватся или авторизироватся.
		</div>
	</div>
</div>

<!-- Подвал -->

<?php require_once("blocks/footer.php") ?>

</body>
<script type="text/javascript">

	if(sesion == 1){
		$(".filter").show();
		$(".no_filter").hide();
	} else {
		$(".filter").hide();
		$(".no_filter").show();
	}

	$("input[name=fill_type]").click(function(){
		var fil = Number($("input[name=fill_type]:checked").val());
		$.ajax({
			url: 'ajax/fil.php',
			type: 'GET',
			cache: false,
			data: {'fil': fil},
			dataType: 'html',
			complete: function(){
				location.reload();
			}
		});
	});

	$(".request").click(function(){
		alert($(".request").val());
	});
</script>
</html>
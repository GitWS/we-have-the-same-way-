<header>
	<div id="logo">
		<center><a href="./index.php">Нам по пути!</a></center>
	</div>

	<div id="menu">
		<div id="no_session">
			Авторизируйтесь для получения функциий!
		</div>

		<div id="passenger">
			Спасибо за использование нашего сервиса!
		</div>

		<div id="driver">
			<label>Меню:</label>
			<button>Создать предложение</button>
		</div>
	</div>

	<div id="RegAuto">
		<button id="register">Регистрация</button>
		<button id="authorization">Авторизация</button>
		<label id="LabelLogin">Логин: <?php echo "Имя!" ?></label>
		<button id="exit">Выход</button>
	</div>

	<script type="text/javascript">
		//Разбивка на сессию
		if(sesion == 0){
			//Регистрация|Авторизация
			$("header #RegAuto #register").show();
			$("header #RegAuto #authorization").show();
			$("header #RegAuto #LabelLogin").hide();
			$("header #RegAuto #exit").hide();
			//Меню
			$("header #menu #no_session").show();
			$("header #menu #passenger").hide();
			$("header #menu #driver").hide();
		} else {
			//Регистрация|Авторизация
			$("header #RegAuto #register").hide();
			$("header #RegAuto #authorization").hide();
			$("header #RegAuto #LabelLogin").show();
			$("header #RegAuto #exit").show();
			//Меню
			if(status_user == 1){
				$("header #menu #no_session").hide();
				$("header #menu #driver").hide();
				$("header #menu #passenger").show();
			} else {
				$("header #menu #no_session").hide();
				$("header #menu #passenger").hide();
				$("header #menu #driver").show();
			}
		}

		//Функции
		$("header #RegAuto #register").click(function(){
			location.href = "./registration.php";
		});
		$("header #RegAuto #authorization").click(function(){
			location.href = "./authorization.php";
		});
		$("header #RegAuto #exit").click(function(){
			alert("Выход");
		});

	</script>
</header>
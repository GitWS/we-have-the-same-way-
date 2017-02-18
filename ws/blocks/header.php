<header>
	<div id="logo">
		<center><a href="./index.php">Нам по пути!</a></center>
	</div>

	<div id="menu">
		<div id="no_session">
			Авторизируйтесь для получения функциий!
		</div>

		<div id="menuUser">
			<nav class="menu">
  				<ul>
				    <li><a href="#">Меню</a>
						<ul>
				        <li id="search">Поиск предложения по коментарию</li>
						<li id="popular">Популярный маршрут</li>
						<li id="maxOrder">Пользователь с большим количеством предложений</li>
						<li id="rare">Самый редкий маршрут</li>
						<li id="createOrder">Создать предложение</li>
				      	</ul>
				    </li>
			  	</ul>
			</nav>
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
			$("header #menu #menuUser").hide();
		} else {
			//Регистрация|Авторизация
			$("header #RegAuto #register").hide();
			$("header #RegAuto #authorization").hide();
			$("header #RegAuto #LabelLogin").show();
			$("header #RegAuto #exit").show();
			//Меню
			if(status_user == 1){
				$("header #menu #no_session").hide();
				$("header #menu #menuUser").show();
				$(".menu #createOrder").hide();
			} else {
				$("header #menu #no_session").hide();
				$("header #menu #menuUser").show();
				$(".menu #createOrder").show();
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
		//Функции меню
		$(".menu #search").click(function(){
			alert("Поиск");
		});
		$(".menu #popular").click(function(){
			alert("Популярный маршрут");
		});
		$(".menu #maxOrder").click(function(){
			alert("Поиск по коментарию");
		});
		$(".menu #rare").click(function(){
			alert("Редкий маршрут");
		});
		$(".menu #createOrder").click(function(){
			location.href = "./createOrderPassanger.php";
		});

	</script>
</header>
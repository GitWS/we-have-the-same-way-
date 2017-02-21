<header>
	<?php 
		session_start();
		if(!isset($_SESSION['FILTER'])){
			$_SESSION['FILTER'] = 0;
		}
		define("HOST","localhost");
	define("DATABASE","ws");
	define("USER","root"); //sony
	define("PASSWORD",""); //root
	?>
	<div id="logo">
		<center><a href="./index.php">Нам по пути!</a></center>
	</div>

	<div id="menu">
		<div id="no_session">
			Авторизируйтесь для получения функциий!
		</div>

		<div id="menuUser">
			<nav class="menu">
  				<ul class="menuUI">
				    <li><a href="#">Меню</a>
						<ul>
						<!--<li id="popular">Популярный маршрут</li>
						<li id="rare">Самый редкий маршрут</li>-->
						<li id="createOrder">Создать предложение</li>
				      	</ul>
				    </li>
			  	</ul>
			  	<!--<form class="menuUI1">
			  		<label>Поиск:</label>
			  		<input type="" name="" id="search" />
			  	</form>-->
			</nav>
		</div>
	</div>

	<div id="RegAuto">
		<button id="register">Регистрация</button>
		<button id="authorization">Авторизация</button>
		<label id="LabelLogin">
		Логин: <?php 
					if(!isset($_SESSION['LOGIN'])){
						echo " ";
					}else{
						echo (string)$_SESSION['LOGIN'];
					}
				?> 
		</label>
		<button id="exit">Выход</button>
	</div>

	<script type="text/javascript">
		var sesion = Number(<?php if(!isset($_SESSION['CONNECT'])) echo "0"; else echo "1"; ?>);
		var status_user = Number(<?php if(!isset($_SESSION['TYPE'])) echo "0"; else echo $_SESSION['TYPE']; ?>); //1 -водитель, 2 - пассажир.

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
			if(status_user == 2){
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
			$.ajax({
				url: './ajax/close_sesion.php',
				type: 'GET',
				cache: false,
				dataType: 'html'
			});
			alert("До свидания!");
			location.href = "./index.php";
		});
		//Функции меню
		/*$(".menu #search").click(function(){
			alert("Поиск");
		});*/
		$(".menu #popular").click(function(){
			alert("Функция не работает");
		});
		$(".menu #rare").click(function(){
			alert("Функция не работает");
		});
		$(".menu #createOrder").click(function(){
			location.href = "./createOrderPassanger.php";
		});

	</script>
</header>
<?php
	define("HOST","localhost");
	define("DATABASE","ws");
	define("USER","root"); //sony
	define("PASSWORD",""); //root

	require_once 'safemysql.class.php'; 
	 
	$q = $_GET["term"]; // на входе получаем переменную term
	$q = str_replace(array("'","\""), "", $q); //убираем возможные служебные символы
	$db = new SafeMySQL(array('user' => USER, 'pass' => PASSWORD,'db' => DATABASE, 'charset' => 'UTF8')); // соединяемся с базой
	  
	$list = $db->getAll("select comment from $orders where upper(descr) like upper('%?p%') group by descr", $q); // делаем запрос к базе
	if (count($list)>1) { // если массив данных содержит более 1 записи, то мы ее выдаем
	echo json_encode($list); // конвертируем массив данных в формат JSON
}
?>
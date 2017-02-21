<?php
	session_start();
	unset($_SESSION['LOGIN']);
	unset($_SESSION['PASSWORD']);
	unset($_SESSION['CONNECT']);
	unset($_SESSION['TYPE']);
	$_SESSION['FILTER'] == 0;
?>
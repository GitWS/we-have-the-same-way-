<?php
	session_start();
	$fil = (int)$_GET['fil'];
	if($fil == 0){
		$_SESSION['FILTER'] = 0;
	}
	if ($fil == 1) {
		$_SESSION['FILTER'] = 1;
	}
	if ($fil == 2) {
		$_SESSION['FILTER'] = 2;
	}
	echo "string";
?>
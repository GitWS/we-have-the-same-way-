<?php  
session_start();
$_SESSION['LoginUser'] = "";
$_SESSION['Connect'] = 0;
header ('Location: ./index.php');
exit();
?>
<?php

session_start();
if (isset($_SESSION['author']) ||isset($_COOKIE['author'])) {
session_destroy();
if ( isset($_COOKIE['author'])) {
	setcookie('author','',time()-3600,'/');
}
header('Location:login.php');
}else{
	header('Location:login.php');
}
?>
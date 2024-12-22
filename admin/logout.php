<?php
session_start();
$isUser = isset($_SESSION['Admin']);
session_unset();
// die(var_dump($_GET));
header('Location: ' . $_SERVER['HTTP_REFERER']);

if (!$isUser) {
	header("location: ../shop/");
} else {
	header("location: index.php");
}

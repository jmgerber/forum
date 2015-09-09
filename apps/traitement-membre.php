<?php
if (!isset($_SESSION['id']))
{
	header('Location: '.str_replace('index.php','home', $_SERVER["SCRIPT_NAME"]));
	exit;
}
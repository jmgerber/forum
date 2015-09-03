<?php 
if ($_SESSION['admin'] == false)
{
	header('Location: home');
	exit;
}
?>
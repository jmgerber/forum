<?php

	$manager = new UserManager ($link);
	$user = $manager->selectById($_SESSION['id']);

	$manager = new Categorie($link);
	$topic = $manager->selectById($_GET['id']);

if (isset($_SESSION['id']))
{
	if ($user->getStatut() == '1' || $user->getStatut() == '2' || $_SESSION['id'] == $topic->getIdAuteur())
	{
		require ('./views/modify-topic.phtml');
	}
	else 
	{
		header ('Location: '.str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'home/'.$topic->getCategory()->getCategory());
		exit;
	}	
}
	
?>
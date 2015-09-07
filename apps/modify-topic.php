<?php

	$manager = new UserManager ($link);
	$user = $manager->selectById($_SESSION['id']);
	var_dump($user);

	$manager = new Categorie($link);
	$categorie = $manager->selectById($_GET['id']);
	var_dump($categorie);

if (isset($_SESSION['id']))
{
	if ($user->getStatut() == '1' || $user->getStatut() == '2' || $_SESSION['id'] == $categorie->getIdAuteur())
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
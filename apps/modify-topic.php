<?php
<<<<<<< HEAD
	$manager = new UserManager ($link);
	$user = $manager->selectById($_SESSION['id']);
	$manager = new Categorie($link);
	$topic = $manager->selectById($_GET['id']);
=======

	$manager = new UserManager ($link);
	$user = $manager->selectById($_SESSION['id']);

	$manager = new Categorie($link);
	$topic = $manager->selectById($_GET['id']);

>>>>>>> dc33cdc7df628cd7b906abacf137e45f5db1c4fa
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
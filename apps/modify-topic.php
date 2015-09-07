<?php

	$manager = new User ($link);
	$user = $manager->getId($_SESSION['id']);
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
}
	
?>
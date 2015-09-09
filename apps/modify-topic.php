<?php
	$manager = new UserManager ($link);
	$user = $manager->selectById($_SESSION['id']);

	$manager = new Categorie($link);
	$topic = $manager->selectById($_GET['id']);

	if (isset($topic))	
		require ('./views/modify-topic.phtml');
?>
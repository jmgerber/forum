<?php

var_dump($_GET);
	$manager = new Categorie($link);
	$categorie = $manager->selectById($_GET['id']);
	var_dump($categorie);

	require ('./views/modify-topic.phtml');
?>
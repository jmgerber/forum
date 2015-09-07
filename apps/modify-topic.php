<?php

var_dump($_GET);
	$manager = new Categorie($link);
	$categorie = $manager->selectById($_GET['id']);
	var_dump($categorie);

if (isset($_SESSION['id']))
{
	if ($_SESSION['admin'] == true || $_SESSION)
}
	require ('./views/modify-topic.phtml');
?>
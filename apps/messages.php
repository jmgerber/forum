<?php
if (isset($_GET['category'], $_GET['topic']))
{
	$categoryName = $_GET['category'];
	$topicName = $_GET['topic'];

	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($categoryName);

	//Récupération du topic
	$topic = $categorie->selectByName($topicName);
	require ('views/messages.phtml');
}
?>
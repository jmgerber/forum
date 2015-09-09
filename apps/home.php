<?php
if (isset($_GET['category'], $_GET['topic']))
{
	$categoryName = $_GET['category'];
	$topicName = $_GET['topic'];
	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($categoryName);
	
 	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($categoryName);

	//Récupération du topic
	$topic = $categorie->selectByName($topicName);
	if (isset($categorie, $topic))
	{
		require ('./apps/messages.php');
	}
	else
		require('./apps/display-home.php');
	
}
else if (isset($_GET['category']))
{
	$categoryName = $_GET['category']; 
	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($_GET['category']);
	if (isset($categorie))
		require ('./apps/topic.php');
	else 
		require('./apps/display-home.php');
}
else
{
	require('./apps/display-home.php');
}
?>
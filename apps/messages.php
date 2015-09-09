<?php
<<<<<<< HEAD
$categoryName = $_GET['category'];
$topicName = $_GET['topic'];
// /!\ 
//Récupération de la catégorie
$manager = new CategorieManager($link);
$categorie = $manager->selectByName($categoryName);
=======
if (isset($_GET['category'], $_GET['topic']))
{
	$categoryName = $_GET['category'];
	$topicName = $_GET['topic'];

	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($categoryName);
>>>>>>> 8d6489b3d32a3fdc57765641bf10ba7852cf9bc4

	//Récupération du topic
	$topic = $categorie->selectByName($topicName);
	require ('views/messages.phtml');
}
?>
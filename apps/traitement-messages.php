<?php
var_dump($_POST);
var_dump($_GET);

//Insertion d'un nouveau message
if (isset($_POST['insert'], $_POST['contenu']))
{
	$categoryName = $_GET['category'];
	$topicName = $_GET['topic'];

	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($categoryName);
	// var_dump($categorie->getId());

	//Récupération du topic
	$topic = $categorie->selectByName($topicName);
	// var_dump($topic->getId());

	$message = $topic->create($_POST['contenu']);
	header('Location: http://localhost/forum/home/'.$categoryName.'/'.$topicName);
	exit;
}

//Mise à jour d'un message
if (isset($_POST['update']))
{

}

//Suppression d'un message
if (isset($_POST['delete']))
{

}

//Signalement d'un message
if (isset($_POST['signalement']))
{

}
?>
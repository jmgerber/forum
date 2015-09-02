<?php
var_dump($_POST);
var_dump($_GET);

//Récupération des infos message, topic, category
if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$manager = new Topic($link);
	$message = $manager->selectById($id);
	$topic = $message->getTopic();
	
	$category = $topic->getCategory()->getCategory();
	$topic = $topic->getTitre();
}

//Insertion d'un nouveau message
if (isset($_POST['insert'], $_POST['contenu']))
{
	$categoryName = $_GET['category'];
	$topicName = $_GET['topic'];

	//Récupération de la catégorie
	$manager = new CategorieManager($link);
	$categorie = $manager->selectByName($categoryName);

	//Récupération du topic
	$topic = $categorie->selectByName($topicName);

	try
	{
		$message = $topic->create($_POST['contenu']);
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
		
	}
	if (empty($error))
	{
		// header('Location: http://localhost/forum/home/'.$categoryName.'/'.$topicName);
		exit;
	}
}

//Mise à jour d'un message
if (isset($_POST['update']))
{

}

//Suppression d'un message
if (isset($_POST['delete']))
{
	$manager->delete($id);
	header('Location: http://localhost/forum/home/'.$category.'/'.$topic);
	exit;
}

//Signalement d'un message
if (isset($_POST['signalement']))
{

}
?>
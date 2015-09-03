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
	$categorie = $topic->getCategory();

	$categoryName = $topic->getCategory()->getCategory();
	$topicName = $topic->getTitre();
}

//Insertion d'un nouveau message
if (isset($_POST['insert'], $_POST['contenu']))
{
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
		header('Location: home/'.$categoryName.'/'.$topicName);
		exit;
	}
}

//Mise à jour d'un message
if (isset($_POST['update'], $_POST['contenu']))
{
	try
	{
		$message->setContenu($_POST['contenu']);
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
	}
	if(empty($error))
	{
		$topic->update($message);
		exit;
	}
		
}

//Suppression d'un message
if (isset($_POST['delete']))
{
	$manager->delete($id);
	header('Location: home/'.$categoryName.'/'.$topicName);
	exit;
}

//Signalement d'un message
if (isset($_POST['signalement']))
{
 	$message->signalement();
	$topic->update($message);
	header('Location: home/'.$categoryName.'/'.$topicName);
	exit;
}
?>
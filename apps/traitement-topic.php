<?php

//ajout d'un topic
if (isset($_POST['titreTopic'], $_POST['send'], $_SESSION['id'], $_GET['id']))
{
	$manager = new CategorieManager($link);
	$categorie = $manager->select($_GET['id']);
	try
	{
		$topic = $categorie->create($_POST['titreTopic']);
	}
	catch(Exception  $exception)
	{
		$error = $exception->getMessage();
	}
	if (empty($error))
	{
		header ('Location: '.str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'home/'.$categorie->getCategory().'/'.$topic->getTitre());
		exit;
	}
}

//Supression d'un topic

if (isset($_POST['remove'], $_GET['id']))
{
	$manager = new Categorie($link);
	$topic= $manager->selectById($_GET['id']);
	$id = $topic->getId();

	$manager->delete($id);


	
	header ('Location: '.str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'home/'.$topic->getCategory()->getCategory());
	exit;
}
<<<<<<< HEAD

//modification d'un topic
=======
//modification d'un topic

>>>>>>> 4816bcfc0130d0f5409bf0f72c73e2904eb86108
if (isset($_GET['modify']))
{
	require ('./apps/modify-topic.php');
}

if (isset($_POST['validate']))
{
	
	if ($_POST['titreTopic'] != "" )
	{
	$manager = new Categorie($link);
	$topic = $manager->selectById($_GET['id']);
	$topic = $_POST['titreTopic'];
	var_dump($topic);
	update ($topic);
	}
}
?>



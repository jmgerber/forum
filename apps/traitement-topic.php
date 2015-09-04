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


	var_dump($topic);
	header ('Location: '.str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'home/'.$topic->getCategory()->getCategory());
}

//modification d'un topic

if(isset($_GET['modify'])){
	header('Location: ../modify-topic');
	exit;
}
?>
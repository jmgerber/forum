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

//modification d'un topic
if (isset($_GET['modify']))
{
	require ('./apps/modify-topic.php');
}

if (isset($_POST['validate']))
{
	if ($_POST['titreTopic'] !== "" )
	{
	$manager = new Categorie($link);
	$topic = $manager->selectById($_GET['id']);
	$topic = $topic->getTitre();

	// $manager->update($topic);


	$titre = mysqli_real_escape_string($this->link, $topic->getTitre());
	$request ="UPDATE topics SET titre='".$titre."', WHERE id='".$topic->getId()."' AND id_category='".$this->id."'";
	mysqli_query($this->link, $request);
	}
}
?>



<?php
var_dump($_POST);
var_dump($_GET);
//Insertion d'un nouveau message
if (isset($_POST['insert'], $_POST['contenu']))
{
	$manager = new Topic($link);
	$message = $manager->create($_POST['contenu']);
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
<?php
//Variables pour les messages à afficher
$error= "";
$success = "";

//Connexion à la base de données
$link = @mysqli_connect("localhost" ,"root", "troiswa", "forum-viandes");

if (!$link)
{
	die('Erreur de connexion (' .mysqli_connect_errno(). ') '.mysqli_connect_error());
}

session_start();

//Liste des pages à traiter
$traitementList = array('login', 'logout', 'register', 'compte', 'categorie', 'topics', 'messages', 'gestion', 'tchat', 'membres');
if (isset($_GET['page']) && in_array($_GET['page'], $traitementList, true))
{
	require('./apps/traitement-'.$_GET['page'].'.php');
}

//Liste des pages existantes
$pageList = array('home', 'login', 'logout', 'register', 'compte', 'categorie', 'topics', 'messages', 'gestion', 'tchat', 'membres');
$page = 'home';

if (isset($_GET['page']) && in_array($_GET['page'], $pageList, true))
{
	$page = $_GET['page'];
}
//Accès à l'arborescence
require ('./apps/skel.php');
?>
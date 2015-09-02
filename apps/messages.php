<?php
$category = $_GET['category'];
$topic = $_GET['topic'];

//Récupération de la catégorie
require('models/CategorieManager.class.php');
$manager = new CategorieManager($link);
$categorie = $manager->selectByName($category);
var_dump($categorie->getId());

//Récupération du topic
require('models/Categorie.class.php');
$manager = new Categorie($link);
$topic = $manager->selectByName($topic);
var_dump($topic->getId());

require ('views/messages.phtml');
?>
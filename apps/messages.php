<?php
$category = $_GET['category'];
$topic = $_GET['topic'];

//Récupération de la catégorie
$manager = new CategorieManager($link);
$categorie = $manager->selectByName($category);
var_dump($categorie->getId());

//Récupération du topic
$topic = $categorie->selectByName($topic);
var_dump($topic->getId());

//Récupération des messages
$messages = $topic->selectAll();
var_dump($messages);
require ('views/messages.phtml');
?>
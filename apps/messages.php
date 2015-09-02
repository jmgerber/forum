<?php
$categoryName = $_GET['category'];
$topicName = $_GET['topic'];

//Récupération de la catégorie
$manager = new CategorieManager($link);
$categorie = $manager->selectByName($categoryName);
// var_dump($categorie->getId());

//Récupération du topic
$topic = $categorie->selectByName($topicName);
// var_dump($topic->getId());

require ('views/messages.phtml');
?>
<?php
$categoryName = $_GET['category'];

//Récupération de la catégorie
$manager = new CategorieManager($link);
$categorie = $manager->selectByName($categoryName);

require ('./views/topic.phtml');
?>
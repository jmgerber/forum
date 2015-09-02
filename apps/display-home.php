<?php
// Récupération de la liste des catégories
$manager = new CategorieManager($link);
$list = $manager->selectAll();
require('./views/display-home.phtml');
?>
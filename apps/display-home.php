<?php
// Récupération de la liste des catégories
require('./models/CategorieManager.class.php');
$manager = new CategorieManager($link);
$list = $manager->selectAll();
require('./views/display-home.phtml');
?>
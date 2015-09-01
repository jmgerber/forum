<?php
// Récupération de la liste des catégories
require('./models/CategoryManager.class.php');
$manager = new CategoryManager();
$list = $manager->selectAll();
?>
<?php 
//Gestion des catégories
$manager = new CategorieManager($link);
$liste = $manager->selectAll();

//Gestion des utilisateurs signalés
$manager = new Topic($link);
$messages = $manager->selectBySignal();

//Gestion des droits des utilisateurs
$manager = new UserManager($link);
$users = $manager->selectAll();

require ('./views/gestion.phtml');
?>
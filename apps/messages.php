<?php
// require ('/models/CategorieManager.class.php');
// $categorie = new CategorieManager($link);

$category = urldecode($_GET['category']);
$topic = urldecode($_GET['topic']);
require ('views/messages.phtml');
?>
<?php

$manager = new CategorieManager($link);
$categorie = $manager->selectByName($_GET['category']);
$topics = $categorie->selectAll();
var_dump($topics);

require ('./views/display-topics.phtml');
	// while ($topics = )
	// {
	// require ('./display-topics.phtml')
	// }
?>
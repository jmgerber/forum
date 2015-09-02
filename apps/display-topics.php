<?php

$manager = new CategorieManager($link);
$categorie = $manager->selectByName($_GET['category']);
var_dump($categorie);

require ('./views/display-topics.phtml');
	while ($topics = )
	{
	require ('./display-topics.phtml')
	}
?>
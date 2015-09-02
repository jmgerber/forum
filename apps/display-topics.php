<?php

$manager = new CategorieManager($link);
$categorie = $manager->selectByName($_GET['category']);
$topics = $categorie->selectAll();
var_dump($topics);


$i=0;
while (isset($topics[$i]))
{
	require ('./views/display-topics.phtml');
}	// while ($topics = )
	// {
	// require ('./display-topics.phtml')
	// }
?>
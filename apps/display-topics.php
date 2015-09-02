<?php

$manager = new CategorieManager($link);
$categorie = $manager->selectByName($_GET['category']);
$topics = $categorie->selectAll();

$i=0;
while (isset($topics[$i]))
{
	$topic = $topics[$i]; 
	require ('./views/display-topics.phtml');
	$i++;
}	// while ($topics = )
	// {
	// require ('./display-topics.phtml')
	// }
?>
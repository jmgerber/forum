<?php

$manager = new CategorieManager($link);
$categorie = $manager->selectByName($_GET['category']);
$topics = $categorie->selectAll();

$i=0;
$length = count($topics);
while ($i<$length)
{
	$topic = $topics[$i]; 
	require ('./views/display-topics.phtml');
	$i++;
}
?>
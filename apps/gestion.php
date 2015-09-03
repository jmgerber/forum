<?php 
	$manager = new CategorieManager($link);
	$liste = $manager->selectAll();
	require ('./views/gestion.phtml');
?>
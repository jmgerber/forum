<?php 
	//Gestion des catégories
	$manager = new CategorieManager($link);
	$liste = $manager->selectAll();

	//Gestion des utilisateurs
	$manager = new Topic($link);
	$messages = $manager->selectBySignal();
	$i=0;
	while (isset($messages[$i]))
	{
		var_dump($messages[$i]->getAuteur()->getLogin());
		$i++;
	}
	require ('./views/gestion.phtml');
?>
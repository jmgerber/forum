<?php
// Récupération de la liste des catégories
$manager = new CategorieManager($link);
$list = $manager->selectAll();
$i=0;
while($i<sizeof($list)){
	require('./views/display-home.phtml');
	$i++;
}
?>

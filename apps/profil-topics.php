<?php
$manager = new Categorie($link);
$topics = $manager->selectByIdAuteur($user->getId());
$i=0;
while (isset($topics[$i]))
{
	$topic = $topics[$i];
	$i++;
	require ('./views/profil-topics.phtml');
}
?>

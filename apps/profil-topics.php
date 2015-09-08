<?php
$manager = new Categorie($link);
$topics = $manager->selectByIdAuteur($user->getId());
$i=0;
while (isset($topics[$i]))
{
	$topic = $topics[$i];
	var_dump($topic);
	$i++;
	require ('./views/profil-topics.phtml');
}
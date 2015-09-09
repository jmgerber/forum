<?php
$manager = new Categorie($link);
$topics = $manager->selectByIdAuteur($user->getId());
$i=0;
$length = count($topics);
while ($i < $length)
{
	$topic = $topics[$i];
	$i++;
	require ('./views/profil-topics.phtml');
}
?>

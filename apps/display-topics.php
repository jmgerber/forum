<?php
$manager = new CategorieManager($link);
$categorie = $manager->selectByName($_GET['category']);
$topics = $categorie->selectAll();

$i=0;
$length = count($topics);
while ($i<$length)
{
	$topic = $topics[$i];
	if (isset($_SESSION['id']))
	{
		if ($_SESSION['statut'] == 1)
		{
			require ('./views/display-topics-admin.phtml');
		}
		else if ($_SESSION['statut'] == 2 || $_SESSION['id'] == $topic->getAuteur()->getId())
		{
			require ('./views/display-topics-modo.phtml');
		}
		else
			require ('./views/display-topics-user.phtml');
	}
	else 
		require ('./views/display-topics.phtml');
	$i++; 
}
?>
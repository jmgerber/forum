<?php
if(isset($_POST['string']))
{
	$manager = new Categorie($link);
	$topics = $manager->searchTopics($_POST['string']);
}
elseif(isset($_GET['page']))
{
	$manager = new Categorie($link);
	$topics = $manager->searchTopics(''); 
}
?>
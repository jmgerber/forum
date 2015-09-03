<?php

if (isset($_POST['titreTopic'], $_POST['send'], $_SESSION['id'], $_GET['id']))
{
	$manager = new CategorieManager($link);
	$categorie = $manager->select($_GET['id']);
	try
	{
		$categorie->create($_POST['titreTopic']);
	}
	catch(Exception  $exception)
	{
		$error = $exception->getMessage();
	}

}
header ('Location: ./home');
exit;
?>
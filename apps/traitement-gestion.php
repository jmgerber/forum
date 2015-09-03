<?php 
if ($_SESSION['admin'] == false)
{
	header('Location: home');
	exit;
}
else
{
	//Creation d'un nouvelle catégorie
	if (isset($_POST['create'], $_POST['nom']))
	{
		$manager = new CategorieManager($link);
		try
		{
			$manager->create($_POST['nom']);
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
	}

	//Suppression d'une catégorie
	if (isset($_POST['delete'], $_GET['id']))
	{
		$manager = new CategorieManager($link);
		$manager->delete($_GET['id']);
	}

	//Modification d'un catégorie
	if (isset($_POST['update'], $_POST['nom'], $_GET['id']))
	{
		$manager = new CategorieManager($link);
		$category = $manager->select($_GET['id']);
		$category->setTitre($_POST['nom']);
		$manager->update($category);
	}
}
?>
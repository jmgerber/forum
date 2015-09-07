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

	//Modification des droits des utilisateurs
	if (isset($_POST['update'], $_POST['statut'], $_GET['id']))
	{
		$manager = new UserManager($link);
		$user = $manager->selectById($_GET['id']);
		$user->setStatut($_POST['statut']);
		$manager->update($user);
	}

	//Suspendre temporairement un utlisateur
	if (isset($_POST['bannir'], $_GET['id']))
	{
		
		$manager = new UserManager($link);
		$user = $manager->selectById($_GET['id']);
		$manager->ban($user);

	}

	//Réinitialiser le signalement d'un message
	if (isset($_POST['reset'], $_GET['id']))
	{
		$topic = new Topic($link);
		$message = $topic->selectById($_GET['id']);
		$message->resetSignalement();
		$topic->update($message);
	}
}
?>
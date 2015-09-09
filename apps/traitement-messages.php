<?php
//Insertion d'un nouveau message
if (isset($_POST['insert'], $_POST['contenu'], $_GET['id']))
{
	$id_topic = $_GET['id'];
	$manager = new Categorie($link);
	$topic = $manager->selectById($id_topic);
	try
	{
		$message = $topic->create($_POST['contenu']);
	}
	catch (Exception $e)
	{
		$error = $e->getMessage();
		
	}
	if (empty($error))
	{
		// $_SERVER
		// url du fichier index.php
 		header('Location: ../home/'.$topic->getCategory()->getCategory().'/'.urlencode($topic->getTitre()));
		exit;
	}
}

else
{
	//Récupération des infos message, topic, category
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$manager = new Topic($link);
		$message = $manager->selectById($id);
		$topic = $message->getTopic();
		$categorie = $topic->getCategory();

		$categoryName = $topic->getCategory()->getCategory();
		$topicName = urlencode($topic->getTitre());
	}



	//Mise à jour d'un message
	if (isset($_POST['update'], $_POST['contenu']))
	{
		try
		{
			$message->setContenu($_POST['contenu']);
		}
		catch (Exception $e)
		{
			$error = $e->getMessage();
		}
		if(empty($error))
		{
			$topic->update($message);
			// /!\ header('Location : ');
			exit;
		}
			
	}

	//Suppression d'un message
	if (isset($_POST['delete']))
	{
		$manager->delete($id);
		header('Location: ../home/'.$categoryName.'/'.$topicName);
		exit;
	}

	//Signalement d'un message
	if (isset($_POST['signalement']))
	{
	 	$message->signalement();
		$topic->update($message);
		header('Location: ../home/'.$categoryName.'/'.$topicName);
		exit;
	}
}

?>
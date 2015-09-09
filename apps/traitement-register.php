<?php
$manager = new UserManager($link);
try
{
	if(isset($_POST['login'], $_POST['email'], $_POST['password'], $_POST['password2'], $_FILES['image']))
	{
		if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_FILES['image'])){
			$error = "Il manque des informations";

			$login = $_POST['login'];
			$email = $_POST['email'];
		}
		else
		{
			if($_POST['password'] == $_POST['password2']){
				//Upload du fichier avatar
				$dossier = 'img/';
				$fichier = basename($_FILES['image']['name']);
				$taille_maxi = 100000;
				$taille = filesize($_FILES['image']['tmp_name']);
				$extensions = array('.png', '.gif', '.jpg', '.jpeg');
				$extension = strrchr($_FILES['image']['name'], '.'); 
				//Début des vérifications de sécurité...
				if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
				{
				    $error = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
				    $login = $_POST['login'];
					$email = $_POST['email'];
				}
				elseif($taille>$taille_maxi)
				{
				    $error = 'Le fichier est trop gros.';
				    $login = $_POST['login'];
					$email = $_POST['email'];
				}
				elseif($error == "") //S'il n'y a pas d'erreur, on upload
				{
				    //On formate le nom du fichier ici...
			     	$fichier = strtr($fichier, 
			          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			     	$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			     	if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier) == FALSE) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			     	{
			 			$error = 'Echec de l\'upload !';
			 			$login = $_POST['login'];
						$email = $_POST['email'];
			     	}
			     	else{
				     	$user = $manager->create($_POST['login'], $_POST['email'], $_POST['password'], $dossier . $fichier);
						header('Location:' .str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'login');
						exit;
					}
				}
			}
			else
			{
				$error = "Les deux mots de passe ne correspondent pas";
				$login = $_POST['login'];
				$email = $_POST['email'];
			}
		}
	}
	else
	{
		$login = "";
		$email = "";
	}
}
catch (Exception $exception)
{
	$error = $exception->getMessage();
}


?>


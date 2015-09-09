<?php
$manager = new UserManager($link);
if (!isset($_SESSION['id']))
{
	header('Location:' .str_replace('index.php', '', $_SERVER['SCRIPT_NAME']). 'login');
	exit;
}
$user = $manager->selectById($_SESSION['id']);
if(isset($_POST['update'])){ // Si on envoi le formulaire
	if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['avatar']))
	{
		$error = "Il manque des informations";
	}
	else
	{
		$login = $_POST['login'];
		$email = $_POST['email'];
		$avatar = $_POST['avatar'];

		if(isset($_POST['oldPassword'],$_POST['newPassword1'], $_POST['newPassword2']) // Si les champs de mot de passe sont renseignés
		&& !empty($_POST['oldPassword']) && !empty($_POST['newPassword1']) && !empty($_POST['newPassword2'])) // et s'ils ne sont pas vides
		{
			$oldPassword = $_POST['oldPassword'];
			$newPassword1 = $_POST['newPassword1'];
			$newPassword2 = $_POST['newPassword2'];
			if(password_verify($oldPassword, $user->getPassword()) == TRUE) // Comparaison avec l'ancien mot de passe
			{
				if($newPassword1 !== $newPassword2) // Si les 2 nouveaux mots de passe correspondent
				{
					$error = "La confirmation du mot de passe n'est pas correcte";
				}
				else
				{
					$user->setPassword($newPassword1); // On met à jour le mot de passe
				}
			}
			else
			{
				$error = "L'ancien mot de passe ne correspond pas";
			}
		}
		// On met à jour les autres données
		$user->setLogin($login);
		$user->setEmail($email);
		$user->setAvatar($avatar);
		$manager->update($user);
	}
}
?>
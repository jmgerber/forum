<?php
if(isset($_POST['login'], $_POST['password'])){
	if(empty($_POST['login']) || empty($_POST['password'])){
		$error = "Il manque des informations";
	}
	else
	{
		$login = mysqli_real_escape_string($link, $_POST['login']);
		$password = $_POST['password'];
		$manager = new UserManager($link);
		$user = $manager->select($login);
		if($user)
		{
			// $user->verifPassword($password);
			if(password_verify($password, $user->getPassword()) == TRUE)
			{
				if ($user->isBanned())
				{
					//Compte suspendu pour 60 secondes
					if (((strtotime($user->getBanDate()))+300) < time())
					{
						$manager->unban($user);
						$_SESSION['id'] = $user->getId();
						$_SESSION['statut'] = $user->getStatut();
						if ($user->getStatut() == 1){
							$_SESSION['admin'] = TRUE;
						}
						header('Location:' .str_replace('index.php', '', $_SERVER['SCRIPT_NAME']). 'home');
						exit;
					}
					else
						throw new Exception("Votre compte a été suspendu pour 5 minutes.");
				}
				else
				{
					$_SESSION['id'] = $user->getId();
					$_SESSION['statut'] = $user->getStatut();
					if ($user->getStatut() == 1){
						$_SESSION['admin'] = TRUE;
					}
					header('Location:' .str_replace('index.php', '', $_SERVER['SCRIPT_NAME']). 'home');
					exit;
				}
			}
			else
			{
				$error = "Mot de passe incorrect";
			}
		}
		else{
			$error = "Identifiants incorrects";
		}
	}
}
?>


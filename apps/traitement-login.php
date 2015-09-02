<?php
try
{
	if(isset($_POST['login'], $_POST['password'])){
		if(empty($_POST['login']) || empty($_POST['password'])){
			$error = "Il manque des informations";
		}
		else
		{
			$login = mysqli_real_escape_string($link, $_POST['login']);
			$password = $_POST['password'];
			$manager = new UserManager($link);
			$list = $manager->select($login);
			if(!empty($list)){
				if(password_verify($password, $list->getPassword()) == TRUE)
				{
					$_SESSION['id'] = $list->getId();
					header('Location: home');
					exit;
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

}
catch (Exception $exception)
{
	$error = $exception->getMessage();
}
?>


<?php

if(isset($_POST['login'], $_POST['password']))
{
	$login = mysqli_real_escape_string($link, $_POST['login']);
	$password = $_POST['password'];
	$request = "SELECT * FROM clients WHERE login='".$login."' ";
	$resultat = mysqli_query($link, $request);
	$user = mysqli_fetch_assoc($resultat);
	if (password_verify($password, $user['password']) == TRUE)
	{
		$_SESSION['id'] = $user['id'];
		$_SESSION['login'] = $user['login'];

		if ($user['admin'] == 1)
			$_SESSION['admin'] = true;
		else 
			$_SESSION['admin'] = false;
		header("Location: home");
		exit;
	}
	else
	{
		$error = "login est incorrect";
	}
}

?>

<?php
require('models/UserManager.class.php');
$manager = new UserManager($link);

try
{
	if(isset($_POST['login'], $_POST['password'])){
		if(empty($_POST['login']) || empty($_POST['password'])){
			$error = "Il manque des informations";
		}
		else
		{
			$password = $_POST['password'];
			if(verifPassword($password)
			{
				$error = "lala";
			}
			else
			{
				$error = "lolo";
			}
		}
	}

}
catch (Exception $exception)
{
	$error = $exception->getMessage();
}
?>


<?php
require('models/UserManager.class.php');
$manager = new UserManager($link);

try
{
	if(isset($_POST['login'], $_POST['email'], $_POST['password'], $_POST['password2'], $_POST['avatar'])){
		if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['avatar'])){
			$error = "Il manque des informations";
		}
		else
		{
			if($_POST['password'] == $_POST['password2']){
				$user = $manager->create($_POST['login'], $_POST['email'], $_POST['password'], $_POST['avatar']);
				header('Location: login');
				exit;
			}
			else{
				$error = "Les deux mots de passe ne correspondent pas";
			}
		}
	}

}
catch (Exception $exception)
{
	$error = $exception->getMessage();
}
?>



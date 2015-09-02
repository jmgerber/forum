<?php
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


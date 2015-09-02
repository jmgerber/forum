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
			var_dump($list);

			if(password_verify($password, $list->getPassword()) == TRUE)
			{
				header('Location: home');
				exit;
			}
			else
			{
				$error = "Le mot de passe est incorrect";
			}
		}
	}

}
catch (Exception $exception)
{
	$error = $exception->getMessage();
}
?>


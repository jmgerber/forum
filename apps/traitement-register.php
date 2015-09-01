<?php
require('models/UserManager.class.php');
$manager = new UserManager($link);
if(isset($_POST['create'], $_POST['login'], $_POST['email'], $_POST['password'], $_POST['password2'], $_POST['avatar'])
	&& !empty($_POST['login']));
{
	try
	{
		if(isset($_POST['login'], $_POST['email'], $_POST['password'], $_POST['avatar'])){
			$user = $manager->create($_POST['login'], $_POST['email'], $_POST['password'], $_POST['avatar']);
			header('Location: login');
			exit;
		}

	}
	catch (Exception $exception)
	{
		$error = $exception->getMessage();
	}
}
?>
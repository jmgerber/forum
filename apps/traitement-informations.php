<?php
$manager = new UserManager($link);
$user = $manager->selectById($_SESSION['id']);
if(isset($_POST['update'])){
	if(empty($_POST['login']) || empty($_POST['email']) || empty($_POST['avatar']))
	{
		$error = "Il manque des informations";
	}
	else
	{
		$login = mysqli_real_escape_string($link, $_POST['login']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$avatar = mysqli_real_escape_string($link, $_POST['avatar']);
		
		if(isset($_POST['oldPassword'],$_POST['newPassword1'], $_POST['newPassword2'])
		&& !empty($_POST['oldPassword']) && !empty($_POST['newPassword1']) && !empty($_POST['newPassword2']))
		{
			$oldPassword = $_POST['oldPassword'];
			$newPassword1 = $_POST['newPassword1'];
			$newPassword2 = $_POST['newPassword2'];
			if(password_verify($oldPassword, $user->getPassword()) == TRUE)
			{
				if($newPassword1 !== $newPassword2)
				{
					$error = "La confirmation du mot de passe n'est pas correcte";
				}
				else
				{
					$user->setPassword($newPassword1);
				}
			}
			else
			{
				$error = "L'ancien mot de passe ne correspond pas";
			}
		}
		$user->setLogin($login);
		$user->setEmail($email);
		$user->setAvatar($avatar);
		$manager->update($user);
	}
}
?>
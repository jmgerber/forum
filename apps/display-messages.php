<?php 
//Récupération des messages
$messages = $topic->selectAll();

$i=0;
$length = count($messages);
while ($i < $length)
{
	$message = $messages[$i];
	$id = $messages[$i]->getId();
	$id_user = $messages[$i]->getId_auteur();
	//Récupération des infos user
	$usermanager = new UserManager($link);
	$user = $usermanager->selectById($id_user);
	// $login = $user->getLogin();
	// $avatar = $user->getAvatar();
	if (isset($_SESSION['id']))
	{
		if ($_SESSION['statut'] == 1 || $_SESSION['statut'] == 2 || $_SESSION['id'] == $message->getId_auteur())
		{
			require ('./views/display-messages-admin.phtml');
		}
		else
		{
			require ('./views/display-messages-user.phtml');
		}
	}
	else 
		require ('./views/display-messages.phtml');
	$i++;
}
?>
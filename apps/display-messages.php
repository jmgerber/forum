<?php 
//Récupération des messages
$messages = $topic->selectAll();

$i=0;
while (isset($messages[$i]))
{
	$message = $messages[$i];
	// $contenu = $message->getContenu();
	$date = $message->getFormatDate();
	$id = $message->getId();
	$id_user = $message->getId_auteur();
	//Récupération des infos user
	$usermanager = new UserManager($link);
	$user = $usermanager->selectById($id_user);
	// $login = $user->getLogin();
	// $avatar = $user->getAvatar();
	require ('./views/display-messages.phtml');
	$i++;
}
?>
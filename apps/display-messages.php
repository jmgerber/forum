<?php 
//Récupération des messages
$messages = $topic->selectAll();

$i=0;
while (isset($messages[$i]))
{
	$contenu = $messages[$i]->getContenu();
	$date = $messages[$i]->getDate();
	$id_user = $messages[$i]->getId_auteur();
	//Récupération des infos user
	$usermanager = new UserManager($link);
	$user = $usermanager->selectById($id_user);
	$login = $user->getLogin();
	$avatar = $user->getAvatar();
	require ('./views/display-messages.phtml');
	$i++;
}
?>
<?php 
//Récupération des messages
$messages = $topic->selectAll();

$i=0;
$length = count($messages);
while ($i < $length)
{
	$message = $messages[$i];
	//Récupération des infos user
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
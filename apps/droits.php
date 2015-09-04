<?php
$i=0;
while (isset($users[$i]))
{
	$user = $users[$i];
	if ($user->getStatut() == 0)
	{
		$statut = 'Utilisateur [0]';
	}
	else if ($user->getStatut() == 1)
	{
		$statut = 'Administrateur [1]';
	}
	else
		$statut = 'Modérateur [2]';
	$i++;
	require ('./views/droits.phtml');

}

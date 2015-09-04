<?php
$i=0;
while (isset($users[$i]))
{
	$user = $users[$i];
	if ($user->getStatut() == 0)
	{
		$statut = 'Utilisateur';
	}
	else if ($user->getStatut() == 1)
	{
		$statut = 'Administrateur';
	}
	else
		$statut = 'Modérateur';
	$i++;
	require ('./views/droits.phtml');

}

<?php
if ($_SESSION['statut'] == 1 || $_SESSION['statut'] == 2 || $_SESSION['id'] == $user->getId())
{
	require ('./views/access-message.phtml');
}
?>
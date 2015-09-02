<?php
//Affichage seulement pour un utilisateur connecté
if (isset($_SESSION['id'])) 
{
	require ('./views/add-message.phtml');
}

?>
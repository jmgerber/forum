<?php
//Affiche seulement pour les utilisateurs connectés
if (isset($_SESSION['id']))
	require ('./views/modify-message.phtml');
?>
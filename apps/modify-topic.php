<?php
if (isset($_SESSION['id']))
{
	if (if($_SESSION['id'] != $topic['id_auteur'])
 	{
 		$error = "Vous ne pouvez pas modifier ce Topic sans en être l'auteur";
 	}
 	else
 	{
 		require ('./views/modify-topic.phtml');
 	}
}

?>
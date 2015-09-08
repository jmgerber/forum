<?php
	if (isset($_SESSION['id']))
	{
		if ($_SESSION['statut'] == '1' || $_SESSION['statut'] == '2' || $_SESSION['id'] == $topic->getIdAuteur())
		{
		
			require ('./views/display-modify-topic.phtml');
		}

	}
?>
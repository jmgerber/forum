<?php
	if (isset($_SESSION['login']) && $_SESSION['admin'] == TRUE)
	{
		require ('./views/menu-admin.phtml');
	}
	else if (isset($_SESSION['login']))
	{
		require ('./views/menu-client.phtml');
	}
	else
	{
		require ('./views/menu.phtml');
	}
?>
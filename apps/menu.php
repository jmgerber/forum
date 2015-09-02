<?php
if (isset($_SESSION['id']) && $_SESSION['admin'] == TRUE)
{
	require ('./views/menu-admin.phtml');
}
else if (isset($_SESSION['id']))
{
	require ('./views/menu-client.phtml');
}
else
{
	require ('./views/menu.phtml');
}
?>
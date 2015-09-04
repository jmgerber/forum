<?php
if (isset($_SESSION['id']))
{
	if (isset($_SESSION['admin']) && $_SESSION['admin'] == true)
	{	
	require ('./views/remove-topic.phtml');
	}
}
?>
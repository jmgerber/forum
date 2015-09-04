<?php
if (isset($_GET['category'], $_GET['topic']))
	require ('./apps/messages.php');
else if (isset($_GET['category']))
	require ('./apps/topic.php');
else
{
	require('./views/home.phtml');
	require('./apps/display-home.php');
}
?>
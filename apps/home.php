<?php
var_dump($_GET);
if (isset($_GET['category'], $_GET['topic']))
	require ('./apps/messages.php');
else if (isset($_GET['category']))
	require ('./apps/topic.php');
else
{
	var_dump($_GET);
	require('./views/home.phtml');
	require('./apps/display-home.php');
}

?>
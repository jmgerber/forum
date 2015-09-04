<?php
$i=0;
while (isset($messages[$i]))
{
	$message = $messages[$i];
	$i++;
	require('./views/ban.phtml');
	$_SESSION['success'] = "";
}
?>
<?php
$i=0;
while (isset($messages[$i]))
{
	$message = $messages[$i];
	$i++;
	require('./views/signaled-message.phtml');
	$_SESSION['success'] = "";
}
?>
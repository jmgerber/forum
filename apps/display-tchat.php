<?php
$i=0;
while (isset($messages[$i]))
{
	$message = $messages[$i];
	require ('./views/display-tchat.phtml');
	$i++;
}

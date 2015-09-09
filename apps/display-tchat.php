<?php
$i=0;
$length = count($messages);
while ($i < $length)
{
	$message = $messages[$i];
	require ('./views/display-tchat.phtml');
	$i++;
}

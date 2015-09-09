<?php
$i=0;
$length = count($messages);
while ($i<$length)
{
	$message = $messages[$i];
	$i++;
	require('./views/signaled-message.phtml');
	$_SESSION['success'] = "";// /!\
}
?>
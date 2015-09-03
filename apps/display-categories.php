<?php
$i = 0;
while (isset($liste[$i])) 
{
	$result = $liste[$i];
	require ('./views/display-categories.phtml');
	$i++;
}
?>
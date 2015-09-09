<?php
$i = 0;
$length = count($liste);
while ($i<$length) 
{
	$result = $liste[$i];
	require ('./views/display-categories.phtml');
	$i++;
}
?>
<?php
$i=0;
while (isset($topics[$i]))
{
	$topic = $topics[$i];
	require ('./views/display-topics.phtml');
	$i++;
}

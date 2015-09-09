<?php
$i=0;
$length = count($topics);
while ($i<$length)
{
	$topic = $topics[$i];
	require ('./views/display-topics.phtml');
	$i++;
}
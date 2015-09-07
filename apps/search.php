<div class="row topic-header">
	<div class="col-md-5">Sujet des topics</div>
	<div class="col-md-2">Auteur</div>
	<div class="col-md-1">Messages</div>
	<div class="col-md-2">dernier</div>
	<div class="col-md-2"></div>
</div>
<?php
$i=0;
while (isset($topics[$i]))
{
	$topic = $topics[$i];
	require ('./views/display-topics.phtml');
	$i++;
}

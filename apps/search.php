<div class="row topic-header">
	<div class="col-md-5">Sujet des topics</div>
	<div class="col-md-1">Auteur</div>
	<div class="col-md-2">Messages</div>
	<div class="col-md-2">Date de publication</div>
	<div class="col-md-1"></div>
	<div class="col-md-1"></div>
</div>
<?php // /!\ DAFUK
$i=0;
$length = count($topics);
while ($i<$length)
{
	$topic = $topics[$i];
	require ('./views/display-topics.phtml');
	$i++;
}

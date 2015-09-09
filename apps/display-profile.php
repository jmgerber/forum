<?php
if (isset($_SESSION['id']))
{
	require ('./views/display-profile-on.phtml')
}
else
{
	require ('./views/display-profile-off.phtml')
}
?>
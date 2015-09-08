<?php 
if(isset($_SESSION['id']))
	require ('./views/display-loginlien.phtml');
else
	require ('./views/display-login.phtml');
	
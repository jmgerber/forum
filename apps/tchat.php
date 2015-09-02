<?php
$manager = new TchatManager($link);
$messages = $manager->selectAll();
require('./views/tchat.phtml');
?>
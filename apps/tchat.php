<?php
$manager = new TchatManager($link);
$messages = $manager->selectLast();
require('./views/tchat.phtml');
?>
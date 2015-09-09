<?php
session_destroy();
$_SESSION = array();
header('Location:' .str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).'home');
exit;
?>
<?php
$manager = new TchatManager($link);
if(isset($_POST['submit'])){

	if(!empty('message')){
		$message = mysqli_real_escape_string($link, $_POST['message']);
		$tchat = $manager->create($message);
	}
	else{
		echo "Veuillez entrer un message";
	}
}
$messages = $manager->selectLast();
require('./views/tchat.phtml');
?>
<?php
$manager = new TchatManager($link);
if(isset($_POST['submit'])){

	if(!empty('message')){
		$id_auteur = $_SESSION['id'];
		$message = mysqli_real_escape_string($link, $_POST['message']);
		$tchat = $manager->create($message);
	}
	else{
		echo "Veuillez entrer un message";
	}
}
$manager = new TchatManager($link);
$messages = $manager->selectAll();
require('./views/tchat.phtml');
?>
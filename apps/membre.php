<?php 
if(isset($_SESSION['id'])){
	$manager = new UserManager($link);
	$infos = $manager->selectById($_GET['id']);
	if($infos->getStatut() == 0){
		$statut = "Membre";
	}
	elseif($infos->getStatut() == 1){
		$statut = "Administrateur";
	}
	else{
		$statut = "Modérateur";
	}
	require('./views/membre.phtml');
}
?>
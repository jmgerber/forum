<?php 
if(isset($_SESSION['id'], $_GET['id'])){
	$manager = new UserManager($link);
	$infos = $manager->selectById($_GET['id']);
	if(!is_null($infos)){
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
}
?>
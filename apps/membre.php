<?php 
if(isset($_SESSION['id'], $_GET['id'])){
	$manager = new UserManager($link);
	$user = $manager->selectById($_GET['id']);
	$categorie = new Categorie($link);
	$topic = new Topic($link);

	if(!is_null($user)){
		if($user->getStatut() == 0){
			$statut = "Membre";
		}
		elseif($user->getStatut() == 1){
			$statut = "Administrateur";
		}
		else{
			$statut = "Modérateur";
		}
		require('./views/membre.phtml');
	}
}
else
{
	// /!\ DAFUK
	?>
	<h2>Vous n'avez pas accès à ces informations hors connexion</h2>
	<?php
}
?>
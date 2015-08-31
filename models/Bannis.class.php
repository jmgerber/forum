<?php
class Bannis
{
	// // Propriétés de notre class Tchat
	private $id;
	private $id_user;
	private $statut;

	//GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getId_user()
	{
		return $this->id_user;
	}
	public function getStatut()
	{
		return $this->statut;
	}

	//SETTER

	public function setStatut($statut)
	{
		if ($statut != 1)
			$this->statut = $statut;
		else
			throw new Exception('Votre compte a été suspendu suite à décision du modérateur');

	}
}

?>
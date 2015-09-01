<?php
class Categorie
{
	// Propriétés de la class class Message
	private $id;
	private $category;

	// Méthodes de la class Message
	// GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getCategory()
	{
		return $this->category;
	}

	// SETTER
	public function setCategory($nom)
	{
		if (strlen($nom) > 3 && strlen($nom) < 33)
			$this->nom = $nom;
		else
			throw new Exception("La longueur du titre de la catégorie doit être compris entre 4 et 32 caracteres");
	}
}
?>
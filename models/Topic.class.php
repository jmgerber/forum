<?php
class Topic{
	//Propriétés
	private $id;
	private $titre;
	private $date;
	private $id_auteur;
	private $id_category;

	//GETTERS
	public function getId()
	{
		return $this->id;
	}
	public function getTitre()
	{
		return $this->titre;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getIdAuteur()
	{
		return $this->id_auteur;
	}
	public function getIdCategory()
	{
		return $this->id_category;
	}

	//SETTERS
	public function setTitre($titre)
	{
		if (!empty($titre))
		{
			$this->titre = $titre;
		}
		else
		{
			throw new Exception("Veuillez saisir un titre.");
		}
	}

	public function setDate()
	{
		$this->date = time();
	}

?>
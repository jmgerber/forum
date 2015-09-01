<?php
class Message
{
	// Propriétés de la class class Message
	private $id;
	private $contenu;
	private $date;
	private $id_auteur;
	private $id_topic;

	// Méthodes de la class Message
	// GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getContenu()
	{
		return $this->contenu;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getId_auteur()
	{
		return $this->id_auteur;
	}
	public function getId_topic()
	{
		return $this->id_topic;
	}
	public function getSignalement()
	{
		return $this->signalement;
	}
	// SETTER
	public function setContenu($contenu)
	{
		if(strlen($contenu) > 0)
			$this->contenu = $contenu;
		else
			throw new Exception("Le nouveau contenu est vide");
	}
	public function setDate($date)
	{
		$this->date = time();
	}
	
}
?>
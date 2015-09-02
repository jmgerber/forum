<?php
class Message
{
	// Propriétés de la class class Message
	private $id;
	private $contenu;
	private $date;
	private $id_auteur;
	private $id_topic;
	private $link; 

	public function __construct($link)
	{
		$this->link = $link;
	}

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

	public function getAuteur()
	{
		$manager = new UserManager($this->link);
		$user = $manager->selectById($this->id_auteur);
		return $user;
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
			throw new Exception("Le contenu du message est vide");
	}
	public function setDate()
	{
		$this->date = time();
	}

	//OTHERS
	public function signalement()
	{
		$this->signalement += 1;
	}

	public function resetSignalement()
	{
		$this->signalement = 0;
	}
}
?>
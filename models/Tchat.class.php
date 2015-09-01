<?php
class Tchat
{
	// // Propriétés de notre class Tchat
	private $id;
	private $message;
	private $date;
	private $id_auteur;


	//GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getMessage()
	{
		return $this->message;
	}
	public function getDate()
	{
		return $this->date;
	}
	public function getId_auteur()
	{
		return $this->id_auteur;
	}

	//SETTER
	public function setMessage($message)
	{
		if (strlen($message) > 1)
			$this->message = $message;
		else
			throw new Exception('Aucun message saisie');
	}
	public function setDate()
	{
		$this->date = time();
	}
}

?>
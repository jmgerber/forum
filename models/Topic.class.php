<?php
class Topic{
	//Propriétés
	private $id;
	private $titre;
	private $date;
	private $id_auteur;
	private $id_category;
	private $link; 

	public function __construct($link)
	{
		$this->link = $link;
	}

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

	//MessagesManager
	public function create($contenu)
	{
		$message = new Message($this->link);
		$message->setContenu($contenu);
		$message->setDate();
		$message->setSignalement(false);

		$contenu = mysqli_real_escape_string($contenu);
		$id_auteur = $_SESSION['id'];
		$id_topic = $this->id;
		$request = "INSERT INTO messages
		VALUES (NULL, '".$contenu."', '".$date."', '".$id_auteur."', '".$id_topic."', '".$signalement."')";
		$res = mysqli_query($this->link, $request);
		//Récupère l'id de la dernière requête SQL à savoir UPDATE !
		if ($res)
			return $this->select(mysqli_insert_id($this->link));
		else
			throw new Exception("Erreur interne du serveur");
	}

	public function delete($id)
	{
		$request = "DELETE FROM messages WHERE id = '".intval($id)."'";
		mysqli_query($this->link, $request);
	}

	public function update($message)
	{
		$contenu = mysqli_real_escape_string($this->link, $message->getContenu());
		$signalement = intval($message->getSignalement());
		$id_topic = intval($message->getId_topic);
		$request = "UPDATE messages
		SET contenu = '".$contenu."', signalement = '".$signalement."'
		WHERE id_topic = '".$id_topic."'";
		mysqli_query($this->link, $request);
		
	}

	public function selectAll()
	{
		$request = "SELECT * from messages WHERE id_topic = '"$this->id"'";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($message = mysqli_fetch_object($res, "Message", array($this->link)))
		{
			$resultat[] = $message;
		}
		return $resultat;
	}
?>
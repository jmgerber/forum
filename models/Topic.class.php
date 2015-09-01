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
		if (!empty($contenu))
		{
			$contenu = mysqli_real_escape_string($contenu);
			$date = time();
			$id_auteur = $_SESSION['id'];
			$id_topic = $this->id;
			$signalement = 0;
			$request = "INSERT INTO messages
			VALUES (NULL, '".$contenu."', '".$date."', '".$id_auteur."', '".$id_topic."', '".$signalement."')";
			mysqli_query($this->link, $request);
			//Récupère l'id de la dernière requête SQL à savoir UPDATE !
			return $this->select(mysqli_insert_id($this->link));
		}
		else 
		{
			throw new Exception("Pour publier, vous devez saisir un message.");
		}
		
	}

	public function delete($id)
	{
		$request = "DELETE FROM messages WHERE id = '".intval($id)."'";
		mysqli_query($this->link, $request);
	}

	public function update($contenu, $signalement, $id_topic)
	{
		if (!empty($contenu))
		{
			$contenu = mysqli_real_escape_string($contenu);
			$request = "UPDATE messages
			SET contenu = '".$contenu."', signalement = '".$signalement."')
			WHERE id_topic = '".$id_topic."'";
			mysqli_query($this->link, $request);
		}
		else 
		{
			throw new Exception("Pour modifier, vous devez saisir un message.");
		}
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
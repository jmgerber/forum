<?php
class Topic
{
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
	public function getFormatDate()
	{
		return date('d/m/Y', strtotime($this->date));
	}
	public function getIdAuteur()
	{
		return $this->id_auteur;
	}
	public function getAuteur()
	{
		$manager = new UserManager($this->link);
		$user = $manager->selectById($this->id_auteur);
		return $user;
	}
	public function getIdCategory()
	{
		return $this->id_category;
	}

	public function getCategory()
	{
		$manager = new CategorieManager($this->link);
		$categorie = $manager->select($this->id_category);
		return $categorie;
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
		$contenu = mysqli_real_escape_string($this->link, $contenu);
		$message->setContenu($contenu);		
		$id_auteur = $_SESSION['id'];
		$id_topic = $this->id;
		$request = "INSERT INTO messages (contenu, id_auteur, id_topic)
		VALUES ('".$contenu."', '".$id_auteur."', '".$id_topic."')";
		$res = mysqli_query($this->link, $request);
		//Récupère l'id de la dernière requête SQL à savoir UPDATE !
		if ($res)
			return $this->selectById(mysqli_insert_id($this->link));
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
		$id = intval($message->getId());
		$request = "UPDATE messages
		SET contenu = '".$contenu."', signalement = '".$signalement."'
		WHERE id = '".$id."'";
		mysqli_query($this->link, $request);
	}

	public function selectAll()
	{
		$request = "SELECT * from messages WHERE id_topic = '".$this->id."'";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($message = mysqli_fetch_object($res, "Message", array($this->link)))
		{
			$resultat[] = $message;
		}
		return $resultat;
	}

	public function selectById($id)
	{
		$request = "SELECT * from messages WHERE id = '".$id."'";
		$res = mysqli_query($this->link, $request);
		$message = mysqli_fetch_object($res, "Message", array($this->link));
		return $message;
	}


	public function selectBySignal()
	{
		$request = "SELECT * from messages WHERE signalement > 0 ORDER BY signalement DESC";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($message = mysqli_fetch_object($res, "Message", array($this->link)))
		{
			$resultat[] = $message;
		}
		return $resultat;
	}
	public function count($id_topic)
	{
		$request = "SELECT COUNT(*) FROM messages WHERE id_topic = '".$id_topic."'";
		$res = mysqli_query($this->link, $request);
		$count = mysqli_fetch_assoc($res);
		return $count;
	}

	public function countMessages($id_user)
	{
		$request = "SELECT COUNT(*) FROM messages WHERE id_auteur='".$id_user."'";
		$res = mysqli_query($this->link, $request);
		$count = mysqli_fetch_assoc($res)['COUNT(*)'];
		return $count;
	}
}
?>
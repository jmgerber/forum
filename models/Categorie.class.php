<?php
class Categorie
{
	// Propriétés de la class class Categorie
	private $id;
	private $category;

	//**Proprietes concernant le TopicManager **//
	private $link;

	// Constructeur

	public function  __construct($link)
	{
		$this->link = $link;
	}


	// Méthodes de la class Categorie
	// GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getCategory()
	{
		return $this->category;
	}

	//Setter
	public function setTitre($titre)
	{
		if (strlen($titre) > 3 && strlen($titre) < 128)
			$this->category = $titre;
		else
			throw new Exception("La longueur du titre de la catégorie doit être compris entre 4 et 128 caractères");
	}

	//**Methodes concernant le TopicManager**//
	public function create($titre)
	{
		$topic = new Topic($this->link);
		$topic->setTitre($titre);
		$titre = mysqli_real_escape_string($this->link, $titre);
		$request = "INSERT INTO topics (titre, id_auteur, id_category) VALUES ('".$titre."', '".$_SESSION['id']."', '".$this->id."')";
		$res = mysqli_query($this->link, $request);
		if ($res)
			return $this->select(mysqli_insert_id($this->link));
		else
			throw new Exception("Internal server error");
	}
	public function delete($id)
	{
		$request = "DELETE FROM topics WHERE id ='".intval($id)."'";
		mysqli_query($this->link, $request);
	}
	public function update($titre)
	{
		$titre = mysqli_real_escape_string($this->link, $topic->getTitre());
		$request ="UPDATE topics SET titre='".$titre."', WHERE id='".$topic->getId()."' AND id_category='".$this->id."'";
		mysqli_query($this->link, $request);
	}
	public function select($id)
	{
		$request = "SELECT * FROM topics WHERE id='".intval($id)."' AND id_category='".$this->id."'";
		$res = mysqli_query($this->link, $request);
		$topics = mysqli_fetch_object($res, 'Topic', array($this->link));
		return $topics;
	}

	public function selectById($id)
	{
		$request = "SELECT * FROM topics WHERE id ='".$id."'";
		$res = mysqli_query($this->link, $request);
		$topic = mysqli_fetch_object($res, 'Topic', array($this->link));
		return $topic;
	}

	public function selectByName($topic)
	{
		$topic = mysqli_real_escape_string($this->link, $topic);
		$request = "SELECT * FROM topics WHERE titre ='".$topic."' AND id_category='".$this->id."'";
		$res = mysqli_query($this->link, $request);
		$topic = mysqli_fetch_object($res, 'Topic', array($this->link));
		return $topic;
	}

	public function searchTopics($string)
	{
		$string = mysqli_real_escape_string($this->link, $string);
		$request = "SELECT * FROM topics WHERE titre LIKE '%".$string."%'";
		$res = mysqli_query($this->link, $request);
		while($topics = mysqli_fetch_object($res, 'Topic', array($this->link)))
		{
			$resultat[] = $topics;
		}	
		return $resultat;
	}
	
	public function selectByIdAuteur($id)
	{
		$request = "SELECT * FROM topics WHERE id_auteur ='".$id."'";
		$res = mysqli_query($this->link, $request);
		while($topics = mysqli_fetch_object($res, 'Topic', array($this->link)))
		{
			$resultat[] = $topics;
		}	
		return $resultat;
	}

	public function selectAll()
	{
		$request = "SELECT * FROM topics WHERE id_category='".$this->id."'";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while($topics = mysqli_fetch_object($res, 'Topic', array($this->link)))
		{
			$resultat[] = $topics;
		}	
		return $resultat;
	}

	public function countTopics($id_user)
	{
		$request = "SELECT COUNT(*) FROM topics WHERE id_auteur='".$id_user."'";
		$res = mysqli_query($this->link, $request);
		$count = mysqli_fetch_assoc($res)['COUNT(*)'];
		return $count;
	}
}
?>
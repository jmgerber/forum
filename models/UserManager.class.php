<?php
class UserManager
{
	private $link; 

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function create($login, $email, $password, $url)
	{
		if
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

	public function delete()
	{

	}

	public function update()
	{

	}

	public function select()
	{

	}

	public function selectAll()
	{
		$request = "SELECT * from user";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($user = mysqli_fetch_object($res, "User", array($this->link)))
		{
			$resultat[] = $user;
		}
		return $resultat;
	}
}
?>
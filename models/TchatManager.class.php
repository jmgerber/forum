<?php
require ('models/Tchat.class.php');
class TchatManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function create($message)
	{
		$tchat = new Tchat($this->link);
		$tchat->setMessage($message);
		$tchat->setDate();

		$message = mysqli_real_escape_string($this->link, $tchat->getMessage());
		$request = "INSERT INTO tchat (message, id_auteur)
		VALUES ('".$message."', '".$_SESSION['id']."')";
		$res = mysqli_query($this->link, $request);
		if ($res)
			return $this->select(mysqli_insert_id($this->link));
		else
			throw new Exception("Erreur interne du serveur.");
	}

	public function selectAll()
	{
		$request = "SELECT * FROM tchat";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($message = mysqli_fetch_category($res, 'Tchat', array($this->link)))
		{
			$resultat[] = $message;
		}
		return $resultat;
	}

}
?>
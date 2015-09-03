<?php
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

		$message = mysqli_real_escape_string($this->link, $tchat->getMessage());
		$request = "INSERT INTO tchat (message, id_auteur)
		VALUES ('".$message."', '".$_SESSION['id']."')";
		$res = mysqli_query($this->link, $request);
	}

	public function selectAll()
	{
		$request = "SELECT * FROM tchat";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($message = mysqli_fetch_object($res, 'Tchat', array($this->link)))
		{
			$resultat[] = $message;
		}
		return $resultat;
	}

	public function selectLast()
	{
		$request = "SELECT * FROM tchat ORDER BY date DESC LIMIT 0, 20";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($message = mysqli_fetch_object($res, 'Tchat', array($this->link)))
		{
			$resultat[] = $message;
		}
		return $resultat;
	}

}
?>
<?php
class UserManager
{
	private $link; 

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function create()
	{
		
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
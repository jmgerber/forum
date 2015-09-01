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
		$user = new User($this->link);
		$user->setLogin($login);
		$user->setEmail($email);
		$user->setAvatar($url);
		$user->setStatut($statut);
		$login = mysqli_real_escape_string($this->link, $user->getLogin());
		$email = mysqli_real_escape_string($this->link, $user->getEmail());
		$avatar = mysqli_real_escape_string($this->link, $user->getAvatar());
		$statut = mysqli_real_escape_string($this->link, $user->getStatut());
		$request = "INSERT INTO user VALUES(NULL, '".$login."', '".$email."', '".$avatar."','')";
		$res = mysqli_query($this->link, $request);
		if($res)
			return $this->select(mysqli_insert_id($this->link));
		else
			throw new Exception("Internal server error");
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
		$request = "SELECT * FROM user";
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
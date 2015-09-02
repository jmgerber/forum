<?php
require('models/User.class.php');
class UserManager
{
	private $link; 

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function create($login, $email, $password, $avatar)
	{
		$user = new User($this->link);
		$user->setLogin($login);
		$user->setEmail($email);
		$user->setPassword($password);
		$user->setAvatar($avatar);
		$login = mysqli_real_escape_string($this->link, $user->getLogin());
		$email = mysqli_real_escape_string($this->link, $user->getEmail());
		$password = mysqli_real_escape_string($this->link, $user->getPassword());
		$avatar = mysqli_real_escape_string($this->link, $user->getAvatar());
		$request = "INSERT INTO user VALUES(NULL, '".$login."', '".$email."', '".$password."', '".$avatar."','')";
		$res = mysqli_query($this->link, $request);
		if($res)
			return $this->select(mysqli_insert_id($this->link));
		else
			throw new Exception("Internal server error");
	}

	public function delete($id)
	{
		$request = "DELETE FROM user WHERE id ='".intval($id)."'";
		mysqli_query($this->link, $request);
	}

	public function update($user)
	{
		$login = mysqli_real_escape_string($this->link, $user->getLogin());
		$email = mysqli_real_escape_string($this->link, $user->getEmail());
		$avatar = mysqli_real_escape_string($this->link, $user->getAvatar());
		$request = "UPDATE user SET
		 	login = '".$login."',
			email = '".$email."',
			avatar = '".$avatar."',
			statut = '".$statut."'
			WHERE id ='".$user->getId()."'";
		mysqli_query($this->link, $request);
	}

	public function select($id)
	{
		$request = "SELECT * FROM user WHERE id = '".intval($id)."'";
		$res = mysqli_query($this->link, $request);
		$user = mysqli_fetch_object($res, 'User', array($this->link));
		return $user;
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
<?php
class User
{
	//Propriétés
	private $id;
	private $login;
	private $email;
	private $password;
	private $avatar;
	private $statut;
	private $link;
	public $ban_date;

	public function  __construct($link)
	{
		$this->link = $link;
	}

	//Méthodes
	//GETTER
	public function getId()
	{
		return $this->id;
	}
	public function getLogin()
	{
		return $this->login;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getPassword()
	{
		return $this->password;
	}
	public function getAvatar()
	{
		return $this->avatar;
	}
	public function getStatut()
	{
		return $this->statut;
	}
	public function getBanDate()
	{
		return $this->ban_date;
	}

	//SETTER
	public function setLogin($login)
	{
		if (strlen($login) > 3 && strlen($login) <=16)
		{
			$this->login = $login;
		}
		else if (strlen($login) > 16)
		{
			throw new Exception("Login trop long.");
		}
		else
		{
			throw new Exception("Login trop court.");
		}
	}
	public function setEmail($email)
	{
		if (!empty($email))
			$this->email = $email;
	}
	public function setPassword($password)
	{
		if (!empty($password))
			$this->password = password_hash($password, PASSWORD_BCRYPT, array("cost"=>11));
	}
	public function setAvatar($avatar)
	{
		if (!empty($avatar))
			$this->avatar = $avatar;
	}
	public function setStatut($statut)
	{
		$this->statut = intval($statut);
	}
	public function setBanDate($date)
	{
		$this->ban_date = $date;
	}

	//AUTRES
	public function modifyPassword($oldPassword, $newPassword)
	{
		if ($this->verifPassword($oldPassword))
		{
			$this->password = password_hash($newPassword, PASSWORD_BCRYPT, array("cost"=>10));
		}
		else
		{
			throw new Exception("L'ancien mot de passe ne correspond pas.");
		}
	}

	public function isBanned()
	{
		if ($this->ban_date !== NULL)
		{
			throw new Exception("Votre compte a été suspendu pour 5 jours.");
			return true;
		}
		else
			return false;
	}
	
	// public function addBanni($id)
	// {
	// 	$request = "INSERT INTO bannis VALUES(NULL, '".intval($id)."')";
	// 	$res = mysqli_query($this->link, $request);
	// 	if($res)
	// 		return $this->select(mysqli_insert_id($this->link));
	// 	else
	// 		throw new Exception("Une erreur est survenue lors de l'ajout");		
	// }

	// public function deleteBanni($id)
	// {
	// 	$request = "DELETE FROM bannis WHERE id='".intval($id)."'";
	// 	$res = mysqli_query($this->link, $request);
	// 	if($res)
	// 		return $this->select(mysqli_insert_id($this->link));
	// 	else
	// 		throw new Exception("Une erreur est survenue lors du retrait");		
	// }
}
?>
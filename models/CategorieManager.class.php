<?php
require('models/Categorie.class.php');

class CategorieManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	public function select()
	{
		$request = "SELECT * FROM categorie WHERE id = '".$this->id."'";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($categorie = mysqli_fetch_object($res, 'Categorie', array($this->link)))
		{
			$resultat[] = $categorie;
		}
		return $resultat;

	}
	public function selectAll()
	{
		$request = "SELECT * FROM categorie";
		$res = mysqli_query($this->link, $request);
		$resultat = array();
		while ($categorie = mysqli_fetch_object($res, 'Categorie', array($this->link)))
		{
			$resultat[] = $categorie;
		}
		return $resultat;
	}
}
?>
<?php
require('models/Categorie.class.php');

class CategorieManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	public function select($id)// On demande a notre manager de récupérer la category numero $id
	{
		$request = "SELECT * FROM categorie WHERE id = '".intval($id)."'";// on n'oublie pas le intval, pour la sécurité :)
		$res = mysqli_query($this->link, $request);
		// Pas besoin de while ici, vu qu'on ne récup qu'un seul et unique résultat
		$categorie = mysqli_fetch_object($res, 'Categorie', array($this->link));
		return $categorie;

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
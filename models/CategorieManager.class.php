<?php
class CategorieManager
{
	private $link;
	
	public function __construct($link)
	{
		$this->link = $link;
	}

	public function create($nom)
	{
		$category = new Categorie($this->link);
		$category->setTitre($nom);
		$nom = mysqli_real_escape_string($this->link, $category->getCategory());
		$request = "INSERT INTO categories VALUES(NULL, '".$nom."')";
		$res = mysqli_query($this->link, $request);
		if($res)
			return $this->select(mysqli_insert_id($this->link));
		else
			throw new Exception("Internal server error");
	}

	public function delete($id)
	{
		$request = "DELETE FROM categories WHERE id='".intval($id)."'";
		mysqli_query($this->link, $request);
	}

	public function update($category)
	{
		$nom = mysqli_real_escape_string($this->link, $category->getNom());
		$request = "UPDATE categories SET category='".$nom."' WHERE id='".$category->getId()."'";
		mysqli_query($this->link, $request);
	}

	public function select($id)// On demande a notre manager de récupérer la category numero $id
	{
		$request = "SELECT * FROM categories WHERE id = '".intval($id)."'";// on n'oublie pas le intval, pour la sécurité :)
		$res = mysqli_query($this->link, $request);
		// Pas besoin de while ici, vu qu'on ne récup qu'un seul et unique résultat
		$categorie = mysqli_fetch_object($res, 'Categorie', array($this->link));
		return $categorie;
	}

	public function selectByName($category)// On demande a notre manager de récupérer la category par son nom envoyé dans l'URL
	{
		$request = "SELECT * FROM categories WHERE category = '".$category."'";// on n'oublie pas le intval, pour la sécurité :)
		$res = mysqli_query($this->link, $request);
		// Pas besoin de while ici, vu qu'on ne récup qu'un seul et unique résultat
		$categorie = mysqli_fetch_object($res, 'Categorie', array($this->link));
		return $categorie;
	}

	public function selectAll()
	{
		$request = "SELECT * FROM categories";
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
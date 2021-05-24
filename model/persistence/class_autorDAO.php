<?php

class autorDAO extends db {

	public function inserir($autor) {

    $query="insert into autor (nom, cognoms) values ('".$autor->getNom()."',
		'".$autor->getCognoms()."');";

		$resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

	public function modificar($autor) {

 	  $query="update autor set nom = '".$autor->getNom()."', cognoms = '".$autor->getCognoms()."' where id = '".$autor->getId()."';";

    $resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

	public function eliminar($id) {

    $query="delete from autor where id = '".$id."';";

    $resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

	public function cercarId($id) {

		$query="select * from autor where id = '".$id."';";

		$consulta = $this->consulta($query);
		$this->close();

		$row = $consulta->fetch_object();

		if (isset($row)) {
		  $autor = new autor($row->nom, $row->cognoms);
	    $autor->setId($row->id);

		  return $autor;
		}

	}

// li assignem un valor per defecte al parametre $orderBy per poder cridar la funcio sense parametre
	public function veureAutors($orderBy=null) {
		if ($orderBy == 'cognoms-asc') {
			$query="SELECT * FROM autor order by cognoms;";
		} elseif ($orderBy == 'cognoms-desc') {
			$query="SELECT * FROM autor order by cognoms desc;";
		} elseif ($orderBy == 'nom-asc') {
			$query="SELECT * FROM autor order by nom;";
		} elseif ($orderBy == 'nom-desc') {
			$query="SELECT * FROM autor order by nom desc;";
		} else {
			$query="SELECT * FROM autor order by cognoms;";
		}

    $consulta = $this->consulta($query);
		$this->close();

		$arrayAutors = array();
		foreach ($consulta as $row) {
		  $autor = new autor($row["nom"], $row["cognoms"]);
	    $autor->setId($row["id"]);
	    array_push($arrayAutors, $autor);
    }

		return $arrayAutors;
  }

}
 ?>

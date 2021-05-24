<?php

class llibreDAO extends db {

	public function inserir($llibre) {

    if ($llibre->getAutor() == '')
			$query="insert into llibre (titol, data_public, autor) values ('".$llibre->getTitol()."',
			'".$llibre->getDataPublic()."', null);";
		else
			$query="insert into llibre (titol, data_public, autor) values ('".$llibre->getTitol()."',
			'".$llibre->getDataPublic()."', '".$llibre->getAutor()."');";

		$resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

	public function modificar($llibre) {

    if ($llibre->getAutor() == '')
 	  	$query="update llibre set titol = '".$llibre->getTitol()."', data_public = '".$llibre->getDataPublic()."', autor = null where id = '".$llibre->getId()."';";
		else
 	  	$query="update llibre set titol = '".$llibre->getTitol()."', data_public = '".$llibre->getDataPublic()."', autor = '".$llibre->getAutor()."' where id = '".$llibre->getId()."';";

    $resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

	public function eliminar($id) {

    $query="delete from llibre where id = '".$id."';";

    $resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

	public function cercarId($id) {

		$query="select * from llibre where id = '".$id."';";

		$consulta = $this->consulta($query);
		$this->close();

		$row = $consulta->fetch_object();

		if (isset($row)) {
		  $llibre = new llibre($row->titol, $row->data_public, $row->autor);
	    $llibre->setId($row->id);

		  return $llibre;
		}

	}

	public function veureLlibres() {
		$query="SELECT * FROM llibre;";

    $consulta = $this->consulta($query);
		$this->close();

		$arrayLlibres = array();
		foreach ($consulta as $row) {
		  $llibre = new llibre($row["titol"], $row["data_public"], $row["autor"]);
	    $llibre->setId($row["id"]);
	    array_push($arrayLlibres, $llibre);
    }

		return $arrayLlibres;
  }

}
 ?>

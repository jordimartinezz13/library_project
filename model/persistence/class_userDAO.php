<?php

class userDAO extends db {

	public function validarUserPassword($user, $pwd) {
		// obtenim els usuaris consultant la BDD
		$query="SELECT * FROM user order by id;";
		$consulta = $this->consulta($query);
		$this->close();

		/* construim un array associatiu $usuaris
		amb el format userName => password */
		foreach ($consulta as $row) {
		  $usuaris[$row['userName']] = $row['password'];
	  }

		// Si el valor de la casella indexada amb el nom del usuari (la password real)
		// es igual que la password introduïda retorna true, si no false
		if (hash_equals($usuaris[$user], crypt($pwd, $usuaris[$user]))) {
				$ok = true;
		} else {
				$ok = false;
		}
		return $ok;
	}

	public function inserir($user) {

		$query="insert into user (userName, password) values ('".$user->getUserName()."', '".$user->getPassword()."');";

		$resultat = $this->consulta($query);
		$this->close();

		return $resultat;
	}

}
 ?>

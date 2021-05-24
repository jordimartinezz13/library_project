<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkLlibres.php';
	require_once '../view/header.php';

	$llibreDAO = new llibreDAO();
	$autorDAO = new autorDAO();

	$arrayAutors = $autorDAO->veureAutors();

	$msg = null;

// comprovem si estem loguejats
if (isset($_SESSION['userName'])) {
		try {

	// si venim de fer submit al formulari, hem de crear l'objecte llibre i persistir-lo a la BDD
			if (isset($_REQUEST['submit'])) {
				  // anem a crear un llibre
				  // inicialment tots els seus paràmetres són null
				  // després li assignarem els valors rebuts del formulari
					$llibre = new llibre(null, null, null);

		  		if (isset($_REQUEST['titol'])) {
		    		$llibre->setTitol($_REQUEST['titol']);
		    	}

		    	if (isset($_REQUEST['data_public'])) {
						$llibre->setDataPublic($_REQUEST['data_public']);
		    	}

					if (isset($_REQUEST['autor'])) {
		    		$llibre->setAutor($_REQUEST['autor']);
		    	}

					$resultat = $llibreDAO->inserir($llibre);
					// el mètode inserir retorna false en cas d'error
					// el missatge d'error es mostra en el mètode consulta de la classe db
					if ($resultat) {
						$msg = "Dades introduides correctament!!";
					}

	// si no venim de fer submit, mostrem el formulari a l'usuari
			} else {
		  	require_once '../view/form_create_llibre.php';
			}
	} catch (Exception $e) {
		$msg = "Error en introduir les dades .$e";
	}
} else {
	$msg = "Operació no autoritzada";
}

if ($msg != null) {
	printMsg($msg);
}

linkLlibres();
include '../view/footer.html';
?>

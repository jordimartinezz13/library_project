<?php

require_once '../config/config.inc.php';
require_once './function_autoload.php';
require_once '../view/printMsg.php';
require_once '../view/header.php';

$userDAO = new userDAO();

$msg = null;

// comprovem si estem loguejats
if (isset($_SESSION['userName'])) {

	// si venim de fer submit al formulari, registrem l'usuari
	if (isset($_REQUEST['submit'])) {

		  // Si els Valors no estan plens no entrarem
		  if (!empty($_REQUEST['user']) && !empty($_REQUEST['password'])
		      && !empty($_REQUEST['password_r'])) {


		    if($_REQUEST['password'] == $_REQUEST['password_r']) {

		        // Assignem els valors a noves variables
		        $usuari = $_REQUEST['user'];
		        $password = $_REQUEST['password'];

		        // encriptem la contrasenya que hem rebut del formulari
		        $hash = crypt($password, null);

		        $user = new user($usuari, $hash);

		        $userDAO->inserir($user);
		        $msg = "Registre finalitzat correctament";
		    } else {
		        $msg = "ERROR: les contrasenyes han de coincidir";
		    }
		  } else {
		      // Si el formulari no està complert, mostrem avis a l'usuari
		      $msg = "No has introduït tota la informació necessaria";
		  }

	// si no venim de fer submit, mostrem el formulari a l'usuari
	} else {
		include '../view/form_registre.php';
	}
} else {
	  $msg = "Operació no autoritzada";
}

if ($msg != null) {
	printMsg($msg);
}

include '../view/footer.html';
?>

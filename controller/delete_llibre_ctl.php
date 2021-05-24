<?php
	require_once '../config/config.inc.php';
	require_once './function_autoload.php';
	require_once '../view/printMsg.php';
	require_once '../view/linkLlibres.php';
	require_once '../view/header.php';

	$llibreDAO = new llibreDAO();

  // comprovem si el llibre existeix abans d'eliminar-lo
	if (isset($_REQUEST['id'])) {
	    $id = $_REQUEST['id'];
			$llibre = $llibreDAO->cercarId($id);
	}

	$msg = null;

// comprovem si estem loguejats
if (isset($_SESSION['userName'])) {
		try {

			if ($llibre != null) {
				$resultat = $llibreDAO->eliminar($id);
				if ($resultat) {
					$msg = "Dades eliminades correctament!!";
				}

			} else {
				$msg = "No s'ha pogut eliminar. El llibre no existeix";
			}

	} catch (Exception $e) {
		$msg = "Error en eliminar les dades .$e";
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

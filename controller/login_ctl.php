<?php
require_once '../config/config.inc.php';
require_once './function_autoload.php';
require_once '../view/header.php';

$userDAO = new userDAO();

// si venim de fer submit al formulari de login, validem les credencials de l'usuari
if (isset($_REQUEST['submit'])) {

  // Si els Valors no estan plens no entrarem
  if (!empty($_REQUEST['user']) && !empty($_REQUEST['password'])) {

      // Assignem els valors a noves variables
      $usuari = $_REQUEST['user'];
      $password = $_REQUEST['password'];

      // Comprovem si user i pass coincideixen
      if ($userDAO->validarUserPassword($usuari, $password)) {

          $_SESSION['userName'] = $usuari;

          // Redirigim a la pagina d'inici
          header('Location: ../');
      } else {

          // Si no coincidissin els valors, redirigirem a 'loginIncorrecte'
          header("Location: ../view/loginIncorrecte.php");
      }
  } else {
      // Si el formulari no està complert, redirigirem a missing'
      header("Location: ../view/missing.php");
  }

// si no venim de fer submit, mostrem el formulari a l'usuari
} else {
	include '../view/form_login.php';
  include '../view/footer.html';
}
?>

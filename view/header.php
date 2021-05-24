<?php
  session_start();
?>

<a href="../">Inici</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

<?php
// comprovem si estem loguejats
if (isset($_SESSION['userName'])) {
  echo 'Has fet login com a <b>' . $_SESSION['userName'] . '</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
  echo '<a href="../controller/logout_ctl.php">Logout</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
  echo '<a href="../controller/registre_ctl.php">Registrar usuari</a>';
}
else
  echo '<a href="../controller/login_ctl.php">Login</a>';

?>

<hr>

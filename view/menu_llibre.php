<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Llibres</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="es" />
	</head>
	<body>
		<?php
			include 'header.php';
		?>

			<a href="../controller/list_llibres_ctl.php">Veure tots els llibres</a><br>
		<?php if (isset($_SESSION['userName'])) { ?>
			<a href="../controller/create_llibre_ctl.php">Alta llibre</a>
		<?php } ?>
			<br><br>
			<a href="../index.php">Inici</a>

		<?php
			include 'footer.html';
		?>
	</body>
</html>

<?php
		require_once '../config/config.inc.php';
		require_once './function_autoload.php';
		require_once '../view/linkAutors.php';
		require_once '../view/header.php';

		$autorDAO = new autorDAO();

		if (!empty($_GET['order-by']))
			$arrayAutors = $autorDAO->veureAutors($_GET['order-by']);
		else
			$arrayAutors = $autorDAO->veureAutors();

		require_once '../view/list_autors.php';

		linkAutors();
		include '../view/footer.html';
?>

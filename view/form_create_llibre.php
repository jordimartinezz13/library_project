<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca" lang="ca">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<form action="../controller/create_llibre_ctl.php" method='post'>
			 <table border='1' cellpadding='2' cellspacing='2'>
				 <tr>
					 <td>Títol</td>
					 <td><input type='text' name='titol' size='50'/></td>
				 </tr>
				 <tr>
					 <td>Data de publicació</td>
					 <td><input type='date' name='data_public' value="<?php echo date('Y-m-d'); ?>"/></td>
				 </tr>
				 <tr>
				 	<td>Autor</td>
				 	<td>
						<select name="autor">
							<option value = "">
							</option>
							<?php
							foreach ($arrayAutors as $a) {
								$id = $a->getId();
								$nom = $a->getNom();
								$cognoms = $a->getCognoms();
							?>
							<option value = "<?php echo $id; ?>">
								<?php
								  // toString
									// echo $a->toString();

									// toString magic
								  echo $a; ?>
							</option>
							<?php } ?>
						</select>
					</td>
				 </tr>
			</table><br/>
			<input type='submit' name='submit' value='Envia' />
		</form>
	</body>
</html>

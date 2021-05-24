<!-- desplegable per seleccionar l'ordenacio-->
		<table cellpadding='2' cellspacing='2'>
			<tr>
				<form action="" method='get'>
					<td><b>Ordenar per:</b></td>
					<td>
						<select name='order-by'>
							<option value = 'cognoms-asc' <?php if (isset($_GET['order-by']) && $_GET['order-by'] == 'cognoms-asc') echo 'selected'; ?>>Cognoms Asc. (A-Z)</option>
							<option value = 'cognoms-desc' <?php if (isset($_GET['order-by']) && $_GET['order-by'] == 'cognoms-desc') echo 'selected'; ?>>Cognoms Desc. (Z-A)</option>
							<option value = 'nom-asc' <?php if (isset($_GET['order-by']) && $_GET['order-by'] == 'nom-asc') echo 'selected'; ?>>Nom Asc. (A-Z)</option>
							<option value = 'nom-desc' <?php if (isset($_GET['order-by']) && $_GET['order-by'] == 'nom-desc') echo 'selected'; ?>>Nom Desc. (Z-A)</option>
						</select>
					</td>
					<td>
						<input type='submit' value='Ordenar resultats' />
					</td>
				</form>
			</tr>
		</table>
		<br>

<!-- llistat d'autors -->
		<table border="1">
		<tr><th>AUTORS: </h3></th></tr>
		<?php
		foreach($arrayAutors as $autor){

		?>
			<tr><td><b>Autor num: </td> <td><?php echo $autor->getId(); ?></td>
	  <?php if (isset($_SESSION['userName'])) { ?>
				<td><a href="../controller/edit_autor_ctl.php?id=<?php echo $autor->getId()?>">Editar</a></td>
				<td><a href="../controller/delete_autor_ctl.php?id=<?php echo $autor->getId()?>">Eliminar</a></td>
		<?php } ?>
			</tr>
			<tr><td>Nom: </td><td><?php
			echo $autor->getNom(); ?></td>			</tr>
			<tr><td>Cognoms: </td><td> <?php echo $autor->getCognoms(); ?></td>	</tr>
		<?php
		}
?>
		</table>

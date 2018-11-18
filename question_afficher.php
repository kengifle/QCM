<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>affichage questions</title>
	</head>
	<body>
		<form action="question_afficher.php" method="POST ">
		</form>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>question</th>
					<th>utilisateur</th>
					<th>theme</th>
				</tr>
			</thead>
			<tbody>
				<?php include('connexion.php');?>
				<?php
				$reponse = $linkpdo->query("SELECT * FROM question");
				// On affiche le resultat dans un tableau
				while ($donnees = $reponse->fetch()) {?>
				<tr>
					<td><?php echo ($donnees['id_question']); ?></td>
					<td><?php echo ($donnees['label_question']); ?></td>
					<td><?php echo ($donnees['id_user_fk']); ?></td>
					<td><?php echo ($donnees['id_theme_fk']); ?></td>
				</tr>
				<?php } ?>
				<?php
				$reponse->closeCursor();
				?>
			</tbody></table>
		</body>
		<?php include "footer.html"?>
	</html>
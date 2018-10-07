<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>affichage question</title>
	</head>
	<body>
		<thead>
			<tr>
				<th>id_question</th>
				<th>label_question</th>
				<th>user_question</th>
				<th>theme_question</th>
			</tr>
		</thead>
		<tbody>
			<?php include('connexion.php');?>
			<?php
			//requete simple (pas d'entrées user)
			$reponse = $linkpdo->query("SELECT * FROM question");
			while ($donnees = $reponse->fetch()) {?>
			<?php?>
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
</html>
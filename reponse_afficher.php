<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>affichage reponses</title>
</head>

<body>
	<form action="reponse_afficher.php" method="POST ">
	</form>
	<table>
		<thead>
			<tr>
				<th>id_reponse</th>
				<th>label_reponse</th>
				<th>validite</th>
				<th>id_question_fk</th>
			</tr>
		</thead>
		<tbody>
			<?php include('connexion.php');?>
			<?php
				$reponse = $linkpdo->query("SELECT * FROM reponse");
				// On affiche le resultat
				while ($donnees = $reponse->fetch()) {?>
			<tr>
				<td>
					<?php echo ($donnees['id_reponse']); ?>
				</td>
				<td>
					<?php echo ($donnees['label_reponse']); ?>
				</td>
				<td>
					<?php echo ($donnees['validite']); ?>
				</td>
				<td>
					<?php echo ($donnees['id_question_fk']); ?>
				</td>
			</tr>
			<?php } ?>
			<?php
				$reponse->closeCursor();
				?>
		</tbody>
	</table>
</body>

</html
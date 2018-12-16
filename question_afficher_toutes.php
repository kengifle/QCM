<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Liste questions</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="global.css">
	</head>
	<body>
		<h5 class="mb-4">Liste des questions</h5>

		<form action="question_afficher_toutes.php" method="POST ">
		</form>
		<table class="table text-center">
			<thead>
				<tr>
					<th>Id</th>
					<th>Question</th>
					<th>Utilisateur</th>
					<th>Id Thème</th>
				</tr>
			</thead>
			<tbody>
				<?php include('connexion.php');?>
				<?php
				$reponse = $linkpdo->query("SELECT * FROM question");
				// On affiche le resultat dans le tableau
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


		<button class="btn btn-link" onclick="window.history.back()">Retour</button>
		</body>
		<?php include "footer.html"?>
	</html>
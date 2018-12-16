<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visualisation questions</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="global.css">
</head>
<!--HTML***FORMULAIRE TRAITE SUR CETTE PAGE-->
<body>
	<?php include('connexion.php');?>
	<h5 class="mb-4">Sélectionnez une question pour la visualiser</h5>
	<form action="question_afficher1question.php" method="POST">
		<!--affichage de la liste des questions dans un select : values = id question-->
		<?php $reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>
		<select title="liste_de_questions" name="liste_de_questions">
			<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
			}
			?></select>
		<input class="btn btn-primary ml-2 mb-1" type="submit" value="Afficher la question" name="validation_recherche_question">
	</form>
</body>
</html>

<!--PHP***TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->
<?php if(isset($_POST['validation_recherche_question'])){include('connexion.php');
	$this_id_question=  $_POST['liste_de_questions'];
	$req_afficher_question = $linkpdo->query("SELECT * FROM question where id_question = $this_id_question");?>
	
	<h5 class="my-4">Question :</h5>
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
		<?php
		// On affiche la question
		while ($donnees = $req_afficher_question->fetch()) {?>
			<tr>
				<td>
					<?php echo ($donnees['id_question']); ?>
				</td>
				<td>
					<?php echo ($donnees['label_question']); ?>
				</td>
				<td>
					<?php echo ($donnees['id_user_fk']); ?>
				</td>
				<td>
					<?php echo ($donnees['id_theme_fk']); ?>
				</td>
			</tr>
			<?php } ?>
			<table class="table text-center">
				<thead>
					<tr>
						<th>Réponse</th>
						<th>Validité</th>
						<th>Id Question</th>
					</tr>
				</thead>
				<tbody>
					<?php
				$req_afficher_question->closeCursor();
				?>
					<?php
				$req_afficher_reponses = $linkpdo->query("SELECT * FROM reponse where id_question_fk = $this_id_question");
				// On affiche les réponses correspondant à la question
				while ($donnees2 = $req_afficher_reponses->fetch()) {?>
					<tr>
						<td>
							<?php echo ($donnees2['label_reponse']); ?>
						</td>
						<td>
							<?php echo ($donnees2['validite']); ?>
						<td>
							<?php echo ($donnees2['id_question_fk']); ?>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php $req_afficher_reponses->closeCursor();}?>
		</tbody>
	</table>
	</tbody>
	</table>

<button class="btn btn-link" onclick="window.history.back()">Retour</button>
<?php include "footer.html"?>
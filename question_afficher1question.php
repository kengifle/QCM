<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>affichage questions</title>
	<?php include "header.html"?> 
</head>
<!--HTML***FORMULAIRE TRAITE SUR CETTE PAGE-->
<body>
	<?php include('connexion.php');?>
	<form action="question_afficher1question.php" method="POST">
	<!--affichage et choix du theme-->
	
		<!--affichage de la liste des questions dans un select : values = id question-->
		<?php $reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>
		<select title="liste_de_questions" name="liste_de_questions">
			<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
			}
			?></select>
		<input type="submit" value="afficher la question?" name="validation_recherche_question">
	</form>




	
</body>
<?php include "footer.html"?>
</html>

<!--PHP***TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->
<?php if(isset($_POST['validation_recherche_question'])){include('connexion.php');
	$this_id_question=  $_POST['liste_de_questions'];
	$req_afficher_question = $linkpdo->query("SELECT * FROM question where id_question = $this_id_question");?>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>question</th>
				<th>enseignant</th>
				<th>theme</th>
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
			<table>
				<thead>
					<tr>
						<th>reponse</th>
						<th>validite</th>
						<th>No question</th>
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

	<form action="question_modifier.php" method="POST">
	<!--affichage et choix du theme-->
	
		<!--affichage de la liste des questions dans un select : values = id question-->
		<input type="hidden" name ="question_a_modifier" value="<?php echo $this_id_question;?>">
		<input type="submit" value="modifier cette question?" name="modifier_question">
	</form>


	
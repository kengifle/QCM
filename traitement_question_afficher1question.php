<?php session_start()?>
<!--affichage de la question-->




<?php if(isset($_POST['validation_recherche_question'])){include('connexion.php');
//$_SESSION["id_question_a_modifier"] = $_POST['liste_de_questions'];
//recuperation de l'id de la question a afficher/modifier
$this_id_question=  $_POST['liste_de_questions'];
echo $this_id_question;
$req_afficher_question = $linkpdo->query("SELECT * FROM question where id_question = $this_id_question");?>
<table>
	<thead>
		<tr>
			<th>id_question</th>
			<th>label_question</th>
			<th>user_question</th>
			<th>theme_question</th>
		</tr>
	</thead>
	<tbody>
		<?php
		// On affiche la question
		while ($donnees = $req_afficher_question->fetch()) {?>
		<?php?>
		<tr>
			<td><?php echo ($donnees['id_question']); ?></td>
			<td><?php echo ($donnees['label_question']); ?></td>
			<td><?php echo ($donnees['id_user_fk']); ?></td>
			<td><?php echo ($donnees['id_theme_fk']); ?></td>
		</tr>
		<?php } ?>

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
				<?php
				$req_afficher_question->closeCursor();
				?>
				<?php
				$req_afficher_reponses = $linkpdo->query("SELECT * FROM reponse where id_question_fk = $this_id_question");
				// On affiche les réponses correspondant à la question
				while ($donnees2 = $req_afficher_reponses->fetch()) {?>
				<?php?>
				<tr>
					<td><?php echo ($donnees2['id_reponse']); ?></td>
					<td><?php echo ($donnees2['label_reponse']); ?></td>
					<td><?php echo ($donnees2['validite']); ?>
					<td><?php echo ($donnees2['id_question_fk']); ?></td>
				</tr><?php } ?>
			</tbody></table>
			<?php
			$req_afficher_reponses->closeCursor();}
			?>
		</tbody></table>
					</tbody></table>
<form action="question_modifier1question.php" method="POST">
					<input type="text" name= "id_question_a_modifier" value = "<?php echo $this_id_question;?>">		
					<input type="submit" name="validation_modification" value="modifier?"></div>
</form>
				<a href="question_afficher1question.php">Retour</a>
		<!--modification de la question-->
		
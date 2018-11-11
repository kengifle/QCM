<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>affichage questions</title>
	</head>
	<body>
		<form action="traitement_question_modifier1question.php" method = "POST">
			<?php if(isset($_POST['validation_modification'])){include('connexion.php');
			
			$id_question_a_modifier=$_POST["id_question_a_modifier"];
			echo $id_question_a_modifier;
			//requete pour afficher le label de la question a modifier
				$req_modif_afficher_question = $linkpdo->prepare('SELECT label_question from question where id_question = :id_question_a_modifier');
					///Exécution de la requête
				$req_modif_afficher_question->execute(array('id_question_a_modifier' => $id_question_a_modifier));
				// On affiche la question
			while ($donnees = $req_modif_afficher_question->fetch()) {?>
			<?php?>
			<tr>
				<td><?php echo ($donnees['label_question']); ?></td>
				<td><input type="text" name="new_question" placeholder="entrez la nouvelle question"><br></td>
			</tr>
			<?php } ?>
			<?php
					$req_afficher_reponses = $linkpdo->query("SELECT * FROM reponse where id_question_fk = $id_question_a_modifier");
					// On affiche les réponses correspondant à la question
			while ($donnees2 = $req_afficher_reponses->fetch()) {?>
			<?php?>
			<table><tbody><tr>
				<td><?php echo ($donnees2['id_reponse']);?><br></td>
				<td><?php echo ($donnees2['label_reponse']);?><br></td>
	

				<td><input type="text" name="new_reponse" placeholder="entrez la nouvelle reponse"><br></td>



				<td><?php echo ($donnees2['validite']);?></td>
				<td><input type="text" name="<?php echo $donnees2['id_reponse']?>" value ="<?php echo $donnees2['label_reponse']?>">
				<td><input type="radio" name="<?php echo ($donnees2['id_reponse'])?>" value="1">Vrai<br></td>
				<td><input type="radio" name="<?php echo ($donnees2['id_reponse'])?>" value ="0">Faux<br></td>
			</tr><?php } ?>
		</tbody></table>
		<?php
		$req_afficher_reponses->closeCursor();}
		?>
		
		<!--//champ hidden utilise pour propager l'id de la questiona modifier-->
		<input type="text" name = "id_question_a_modifier" value = "<?php echo $id_question_a_modifier?>">
		
		
		<input type="submit" name="ok" value="ok">
	</form>
</body>
</html>
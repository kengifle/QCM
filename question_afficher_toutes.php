<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>affichage questions</title>
	</head>
	<body>
	<?php include('connexion.php');?>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>question</th>
					<th>enseignant :</th>
					<th>theme</th>
				</tr>
			</thead>
			<tbody>
			<?php $id_theme= $_POST["id_theme"];
				echo ('yo');
				echo $_POST['id_theme'];
				$reponse = $linkpdo->query("SELECT * FROM question where $id_theme=id_theme_fk");
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
		</body>


		<?php include('connexion.php');?>
	<form action="question_afficher1question.php" method="POST">
	<!--affichage et choix du theme-->
	
		<!--affichage de la liste des questions dans un select : values = id question-->
		<?php $reponse = $linkpdo->query("SELECT id_question, label_question FROM question where $id_theme = id_theme_fk");?>
		<select title="liste_de_questions" name="liste_de_questions">
			<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
			}
			?></select>
		<input type="submit" value="afficher la question?" name="validation_recherche_question">
	</form>

		</tbody>
	</table>
	</tbody>
	</table>




		<?php include "footer.html"?>
	</html>
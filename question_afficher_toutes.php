<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>affichage questions</title>
		<?php include "header.html"?> 
	</head>
	<body>
	<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
	<?php include('connexion.php');?>
	<legend>Consulter des questions</legend>
		<table class="table table-hover">
			<thead style = "background-color:white">
				<tr>
					<th>question</th>
					<th>enseignant :</th>
					<th>theme</th>
				</tr>
			</thead>
			<tbody>
			<?php $id_theme= $_POST["id_theme"];
				$reponse = $linkpdo->query("SELECT * FROM question where $id_theme=id_theme_fk");
				// On affiche le resultat dans le tableau
				while ($donnees = $reponse->fetch()) {?>	
				<tr>
					
					<td><?php echo ($donnees['label_question']); ?></td>


					<td><?php 

					$name =($donnees['id_user_fk']);
					$auteur_question = $linkpdo->query("SELECT login_user FROM user where id_user = $name");
					$result = $auteur_question->fetchColumn(); 
					
					
					echo ($result); ?></td>

					
					<td><?php
					$theme =($donnees['id_theme_fk']);
					$theme_question = $linkpdo->query("SELECT label_theme FROM theme where id_theme = $theme");
					$result2 = $theme_question->fetchColumn(); 
					
					
					echo ($result2); ?></td>
				</tr>
				<?php } ?>
				<?php
				$reponse->closeCursor();
				?>
			</tbody></table>
		</body>


		<?php include('connexion.php');?>
	

	<form class="form" action="question_afficher1question.php" method="POST">
	<!--affichage et choix du theme-->
	
		<!--affichage de la liste des questions dans un select : values = id question-->
		<?php $reponse = $linkpdo->query("SELECT id_question, label_question FROM question where $id_theme = id_theme_fk");?>
		<select class="form-control" title="liste_de_questions" name="liste_de_questions">
			<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
			}
			?></select>
		<input type="submit" class="btn btn-primary"value="afficher cette question?" name="validation_recherche_question">
	</form><div>
	<div class="col-sm-3"></div>
</div> 
		</tbody>
	</table>
	</tbody>
	</table>




		<?php include "footer.html"?>
	</html>
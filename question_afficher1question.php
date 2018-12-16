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

<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  

	<?php include('connexion.php');?>
	<form class= "form" action="question_afficher1question.php" method="POST">
	<legend>Choisissez parmi les questions</legend>
	<!--affichage et choix du theme-->
	
		<!--affichage de la liste des questions dans un select : values = id question-->
		<?php $reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>
		<div class="form-group">
		<select class ="form-control" title="liste_de_questions" name="liste_de_questions">
			<?php foreach ($reponse as $data){
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
			}
			?></select></div>
		<div class="form-group"><input type="submit" class ="btn btn-primary" value="afficher cette question?" name="validation_recherche_question">
		</div>
	</form><br>




	


<!--PHP***TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->
<?php if(isset($_POST['validation_recherche_question'])){include('connexion.php');
	$this_id_question=  $_POST['liste_de_questions'];
	$req_afficher_question = $linkpdo->query("SELECT * FROM question where id_question = $this_id_question");?>
	<table table class="table table-hover table-bordered">
		<thead>
			<tr>
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
					<?php echo ($donnees['label_question']); ?>
				</td>
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
			
					<tr>
						<th>reponse</th>
						<th>validite</th>
					</tr>
				
				
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
					
					<td <?php if($donnees2['validite'] == "1"){ echo ("style ='color:blue'");}?>>
						<?php if($donnees2['validite'] == "1"){ echo ("bonne réponse"); }?>
						
					</td>
				</tr>
					<?php } ?>
				
			
			<?php $req_afficher_reponses->closeCursor();}?>
		</tbody>
	</table>
	</tbody>
	</table>

	<form class="form" action="question_modifier.php" method="POST">
	<!--affichage et choix du theme-->
	
		<!--affichage de la liste des questions dans un select : values = id question-->
		<input type="hidden" name ="question_a_modifier" value="<?php echo $this_id_question;?>">
		<input type="submit" class ="btn btn-danger btn-sm" value="modifier cette question?" name="modifier_question">
	</form>
	</div>
	<div class="col-sm-3"></div>
	</div> 
	</body>
<?php include "footer.html"?>
</html>
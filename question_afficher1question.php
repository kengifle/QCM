<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>affichage questions</title>
	</head>
	<body>
		<?php include('connexion.php');?>
		<!--formulaire-->
		<form action="traitement_question_afficher1question.php" method="POST">
			<!--affichage de la liste des questions dans un select-->
			<?php
			include('connexion.php');
			$reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>
			<select title ="liste_de_questions" name="liste_de_questions"><?php
				foreach ($reponse as $data)
				{
				echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
				}
			?></select>
			<input type="submit" value= "afficher la question?" name="validation_recherche_question">
			
		</form>
		
		
			<!--afficher une question-->
			
				
			
		</body>
	</html>
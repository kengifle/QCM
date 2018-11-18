<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ajouter une réponse</title>
	</head>
	<body>
		<form action="reponse_ajouter.php" method="POST">
			<div>
				<input type="text" name='label_reponse' value="écrivez une réponse">
			</div>
			<div><input type="radio" name="bonne_reponse" value="1" checked> Vrai<br>
				<input type="radio" name="bonne_reponse" value="0"> Faux<br>
			</div>
			<input type="submit" name="validation_reponse" value="ajouter la reponse">
		</form>
		<?php
		$id_question_fk=1;
		$label_reponse="";
		$validite=0;
		$label_reponse = $_POST['label_reponse'];
		$validite=$_POST['bonne_reponse'];
		if(isset($_POST['validation_reponse'])){
			include('connexion.php');			
			$req2 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(
			:label_reponse, :validite, :id_question_fk)');
			///Exécution de la requête
			$req2->execute(array('label_reponse' => $label_reponse,'validite' => $validite,'id_question_fk' => $id_question_fk));
		}?>
	</body>
</html>
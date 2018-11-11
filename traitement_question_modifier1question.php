<?php session_start()?>
<!--affichage de la <question-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		
		
		<?php if(isset($_POST["ok"])){
				include('connexion.php');
			//QUESTION
				$id_question_a_modifier = $_POST["id_question_a_modifier"];
				echo $id_question_a_modifier;
				$new_question = $_POST["new_question"];
				//requete pour modifier le label de la question
				$req_modif_label_question = $linkpdo->prepare('UPDATE question SET label_question= :new_question where id_question = :id_question_a_modifier');
				///Exécution de la requête
				$req_modif_label_question->execute(array('new_question' => $new_question, 'id_question_a_modifier' => $id_question_a_modifier));
			//requete pour modifier le label la reponse 1
				$req_afficher_reponses = $linkpdo->query("SELECT id_reponse FROM reponse where id_question_fk = $id_question_a_modifier");
						// On affiche les réponses correspondant à la question
		while ($donnees2 = $req_afficher_reponses->fetch()) {?>


			
		<?php
				$id_reponse_a_modifier =$donnees2['id_reponse'];

				$new_reponse = $_POST["new_reponse"];
				


				//echo $newlabel_reponse;
				//echo $newvalidite;
				
				//$req.=$id_reponse;
				$req = $linkpdo->prepare('UPDATE reponse SET label_reponse  VALUES :new_reponse  where id_reponse = $id_reponse_a_modifier');
					///Exécution de la requête
				$req->execute(array('new_reponse' => $new_reponse));
			
		}}?>
		<a href="question_afficher1question.php">Retour</a>
	</body>
</html>
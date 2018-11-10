<?php session_start()
//principe : une requête ajoute une question dans la table question. 4 requetes ajoutent 4 reponses dans la table reponses en utilisant l'id de la question.
//le theme fournit une valeur par un select alimenté par l'id_user du theme.
//le id_user est récupéré dans sa variable de session pour réaliser l'insert question. Le id_question est récupéré dans une
//variable de session après l'insertion de la question et avant l'insertion des réponses.
//la variable de session 'id_question' est utilisée pour alimenter le champ clé étrangère de la table reponses avec la valeur de l'id de la question inséreée
// (last insert id) avant la fin du script. 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ajouter une question</title>
	</head>
	<body>
		<!--formulaire-->
		<form action="question_ajouter.php" method="POST">
			<label for="title">Theme :</label>
			<div><select  title="choississez dans la liste" name="id_theme">
				<option value="" selected>Thème de la question :</option>
				<option value="1">Mathématiques</option>
				<option value="X">non implémenté</option>
			</select></div>
			<!--question-->
			<label for="title">QUESTION :</label>
			<div><input type="text" name ="texte_question" value ="écrivez une question"></div>
			<label for="title">REPONSES :</label>
			<!--reponse 1-->
			<div><input type="text" name='label_reponse1' value ="écrivez la réponse 1"></div>
			<div><input type="radio" name="bonne_reponse1" value="1" checked> Vrai<br>
				<input type="radio" name="bonne_reponse1" value ="0"> Faux<br></div>
				<!--reponse 2-->
				<div><input type="text" name='label_reponse2' value ="écrivez la réponse 2"></div>
				<div><input type="radio" name="bonne_reponse2" value="1" checked> Vrai<br>
					<input type="radio" name="bonne_reponse2" value ="0"> Faux<br></div>
					<!--reponse 3-->
					<div><input type="text" name='label_reponse3' value ="écrivez la réponse 3"></div>
					<div><input type="radio" name="bonne_reponse3" value="1" checked> Vrai<br>
						<input type="radio" name="bonne_reponse3" value ="0"> Faux<br></div>
						<!--reponse 4-->
						<div><input type="text" name='label_reponse4' value ="écrivez la réponse 4"></div>
						<div><input type="radio" name="bonne_reponse4" value="1" checked> Vrai<br>
							<input type="radio" name="bonne_reponse4" value ="0"> Faux<br></div>
							<!--submit-->
							<input type="submit" name ="validation_question" value = "ajouter la question">
						</form>
						 <button onclick="window.history.back()">Retour</button>


						
					</body>
				</html>
	<?php
	//initialisation des variables
	$id_theme=0;
	$label_question="";
	$id_user=$_SESSION["id_user"];
	if(isset($_POST['validation_question'])){
		include('connexion.php');
	//QUESTION
		//initialisation des variables avec le contenu des input du formulaire
		$id_theme=$_POST["id_theme"];
		$label_question = $_POST["texte_question"];
		$req = $linkpdo->prepare('INSERT INTO question (label_question, id_user_fk, id_theme_fk) VALUES(:label_question, :id_user_fk, :id_theme_fk)');
			///Exécution de la requête
		$req->execute(array('label_question' => $label_question,'id_user_fk' => $_SESSION['id_user'],'id_theme_fk' => $id_theme));
		//recuperation de l'id_question dans une variable de session
		$_SESSION['id_question'] = $linkpdo->lastInsertId();
		//echo($_SESSION['id_question']);
	//REPONSES
		//reponse 1
		$label_reponse1="";
		$validite1=0;
		$label_reponse1 = $_POST['label_reponse1'];
		$validite1=$_POST['bonne_reponse1'];
		$req_reponse1 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse1, :validite1, :id_question_fk)');
			///Exécution de la requête
		$req_reponse1->execute(array('label_reponse1' => $label_reponse1,'validite1' => $validite1,'id_question_fk' => $_SESSION['id_question']));
	//reponse 2
		$label_reponse2="";
		$validite2=0;
		$label_reponse2 = $_POST['label_reponse2'];
		$validite2=$_POST['bonne_reponse2'];
		$req_reponse2 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse2, :validite2, :id_question_fk)');
			///Exécution de la requête
				$req_reponse2->execute(array('label_reponse2' => $label_reponse2,'validite2' => $validite2,'id_question_fk' => $_SESSION['id_question']));
	//reponse 3
		$label_reponse3="";
		$validite3=0;
		$label_reponse3 = $_POST['label_reponse3'];
		$validite3=$_POST['bonne_reponse3'];
		$req_reponse3 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse3, :validite3, :id_question_fk)');
			///Exécution de la requête
		$req_reponse3->execute(array('label_reponse3' => $label_reponse3,'validite3' => $validite3,'id_question_fk' => $_SESSION['id_question']));
	//reponse 4
		$label_reponse4="";
		$validite4=0;
		$label_reponse4 = $_POST['label_reponse4'];
		$validite4=$_POST['bonne_reponse4'];
		$req_reponse4 = $linkpdo->prepare('INSERT INTO reponse (label_reponse, validite,id_question_fk) VALUES(:label_reponse4, :validite4, :id_question_fk)');
			///Exécution de la requête
		$req_reponse4->execute(array('label_reponse4' => $label_reponse4,'validite4' => $validite4,'id_question_fk' => $_SESSION['id_question']));}?>
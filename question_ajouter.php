<?php session_start()
//principe : une requête ajoute une question dans la table question.
//4 requetes ajoutent 4 reponses dans la table reponses en utilisant l'id de la question.
//le theme fournit une valeur depuis un select alimenté par l'id_user du theme.
//le id_user est récupéré dans sa variable de session pour réaliser l'insert question.
//Le id_question est récupéré dans une variable de session après l'insertion de la question et avant l'insertion des réponses.
//la variable de session 'id_question' est utilisée pour alimenter le champ clé étrangère de la table reponses
// avec la valeur de l'id de la question inséreée : (last insert id) avant la fin du script.
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Ajouter une question</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="global.css">
</head>

<body>
	<h5>Créer une nouvelle question</h5>
	<!--formulaire : traitement du formulaire intégré sur la page en cours-->
	<form action="question_ajouter.php" method="POST">
		<label for="title">Thème :</label>
		<div  class="mb-4">

			<?php
				include('connexion.php');
				//select pour le theme, values = id_theme
				$reponse = $linkpdo->query("SELECT id_theme, label_theme FROM theme");?>
			<select title="choississez dans la liste" name="id_theme">
				<?php
						foreach ($reponse as $data)
						{
						echo '<option value="' . $data['id_theme'] . '">' . $data['label_theme'] . '</option>';
						}
				?></select>
		</div>
		<!--question-->
		<label for="title">Question :</label>
		<div class="mb-4"><input type="text" name="texte_question" value="Ecrivez une question"></div>

		<label for="title">Réponses :</label>
		<!--reponse 1-->
		<div class="row mb-2">
			<input type="text" name='label_reponse1' value="Ecrivez la réponse 1">
			<input class="ml-2" type="radio" name="bonne_reponse1" value="1" checked> Vrai
			<input class="ml-2" type="radio" name="bonne_reponse1" value="0"> Faux
		</div>
		<!--reponse 2-->
		<div class="row mb-2">
			<input type="text" name='label_reponse2' value="Ecrivez la réponse 2">
			<input class="ml-2" type="radio" name="bonne_reponse2" value="1" checked> Vrai
			<input class="ml-2" type="radio" name="bonne_reponse2" value="0"> Faux
		</div>
		<!--reponse 3-->
		<div class="row mb-2">
			<input type="text" name='label_reponse3' value="Ecrivez la réponse 3">
			<input class="ml-2" type="radio" name="bonne_reponse3" value="1" checked> Vrai
			<input class="ml-2" type="radio" name="bonne_reponse3" value="0"> Faux
		</div>
		<!--reponse 4-->
		<div class="row mb-2">
			<input type="text" name='label_reponse4' value="Ecrivez la réponse 4">
			<input class="ml-2" type="radio" name="bonne_reponse4" value="1" checked> Vrai
			<input class="ml-2" type="radio" name="bonne_reponse4" value="0"> Faux
		</div>
		<!--submit-->
		<input class="btn btn-primary my-3" type="submit" name="validation_question" value="Sauvegarder la question">
	</form>
	<button class="btn btn-link" onclick="window.history.back()">Retour</button>

</body>
<?php include "footer.html"?>

</html>
<!--PHP TRAITEMENT DU FORMULAIRE-->
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
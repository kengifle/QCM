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
	<title>Modifier une question</title>
	<?php include "header.html"?> 
</head>
<body>
	<!--formulaire : traitement du formulaire intégré sur la page en cours-->
    <?php if(isset($_POST['modifier_question'])) {
    $question_a_modifier = $_POST['question_a_modifier'];?>
	<form action="question_valider_modifications.php" method="POST">
		<label for="title">Theme : <?php echo $_POST['theme_question'];?></label>
		<div>
			<?php
				include('connexion.php');
				$reponse = $linkpdo->query("SELECT label_question FROM question where id_question = $question_a_modifier");
                $result = $reponse->fetchColumn(); 
                echo $result;
               ?>
			<tr>
		</div>
<?php
$req_afficher_reponses = $linkpdo->query("SELECT label_reponse, validite FROM reponse where id_question_fk = $question_a_modifier");
                // On affiche les réponses correspondant à la question
                $result2 = $req_afficher_reponses->fetchAll(PDO::FETCH_COLUMN);
                ;?>
				</tbody>
			</table>
		<!--question-->
		<label for="title">QUESTION :</label>
		<div><input type="text" name="texte_question" placeholder ="<?php echo $result;?>"></div>
		<label for="title">REPONSES :</label>
		<!--reponse 1-->
		<div><input type="text" name='label_reponse1' value="<?php echo $result2[0];?>"></div>
		<div><input type="radio" name="bonne_reponse1" value="1"> Vrai<br>
			<input type="radio" name="bonne_reponse1" value="0" checked> Faux<br></div>
		<!--reponse 2-->
		<div><input type="text" name='label_reponse2' value="<?php echo $result2[1];?>"></div>
		<div><input type="radio" name="bonne_reponse2" value="1"> Vrai<br>
			<input type="radio" name="bonne_reponse2" value="0"checked> Faux<br></div>
		<!--reponse 3-->
		<div><input type="text" name='label_reponse3' value="<?php echo $result2[2];?>"></div>
		<div><input type="radio" name="bonne_reponse3" value="1"> Vrai<br>
			<input type="radio" name="bonne_reponse3" value="0" checked> Faux<br></div>
		<!--reponse 4-->
		<div><input type="text" name='label_reponse4' value="<?php echo $result2[3];?>"></div>
		<div><input type="radio" name="bonne_reponse4" value="1"> Vrai<br>
			<input type="radio" name="bonne_reponse4" value="0" checked> Faux<br></div>
		<!--submit-->
		<input type="submit" name="ok" value="modifier cette question">
	</form>
	<button onclick="window.history.back()">Retour</button>
</body><?php }?>
<?php include "footer.html"?>

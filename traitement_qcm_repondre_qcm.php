<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	


<?php if(isset($_POST['repondre_qcm'])){include('connexion.php');
//recuperation id qcm depuis le formulaire
$this_id_qcm =  $_POST['liste_de_qcm'];
$_SESSION['id_qcm']= $this_id_qcm;
//echo $this_id_qcm;
//requete pour afficher les questions du qcm
//$req_afficher_qcm = $linkpdo->query("SELECT distinct `question`.`id_question`, label_question, `question`.`id_user_fk`, id_theme_fk, label_qcm FROM question, qcm, contenir, reponse where `question`.`id_question` = `contenir`.`id_question_fk`  and `question`.`id_question` = `reponse`.`id_question_fk` and `contenir`.`id_qcm_fk` = $this_id_qcm and `qcm`.`id_qcm_fk` = $this_id_qcm");
$req_afficher_qcm = $linkpdo->query("SELECT  id_question, label_question FROM `contenir`, `question` WHERE `id_qcm_fk` = $this_id_qcm and `contenir`.`id_question_fk`= `question`.`id_question`");
//requete pour obtenir le nom du qcm et l'afficher
$req_nom_qcm = $linkpdo->query("SELECT label_qcm from qcm where id_qcm_fk = $this_id_qcm");
$data = $req_nom_qcm->fetch();
echo $data["label_qcm"];?>
<?php
if (!$req_afficher_qcm) {echo ("ERREUR SYSTEME") ;}
// tant qu'il reste des donnees dans le tab de resultats de la req d'affichage des questions d'un qcm donné,
//on affiche un tableau pour chaque question puis un tableau avec chacune des réponses à cette question
//les questions et leurs réponses sont numérotées pour l'affichage
//la validité de chaque réponse est fournie sous forme de string
$indice_question = 0;

// AFFICHER LA 1e QUESTION
//$donnees = $req_afficher_qcm->fetch(); <!--
while ($donnees = $req_afficher_qcm->fetch()) {?>
<form action="traitement_valider_reponse.php" method="GET">
<table border ="1">
	<p>Question :</p>
	<tbody>
		<table>
			<tr>
				<td><?php echo ("question no : ".$indice_question);
				$question = $donnees['id_question']; ?></td>
				<?php $_SESSION['id_question']=$question;?>
				<tr><td><?php echo ($donnees['label_question']); ?></td></tr>
			</tr>
			<?php 
			
			
			$indice_question++;
			//echo $this_id_qcm;
			echo ('id question : '.$question);?>
		</table>
		<p>Reponses possibles</p>
		<?php $req_afficher_reponses = $linkpdo->query("SELECT distinct  `id_reponse`, `label_reponse`, `validite`, 
		`reponse`.`id_question_fk` FROM question, qcm, contenir, reponse where $question = `reponse`.`id_question_fk` and `reponse`.`id_question_fk`= `contenir`.`id_question_fk` and `contenir`.`id_qcm_fk` = $this_id_qcm");
		$indice_reponse = 1;
		while ($donnees = $req_afficher_reponses->fetch()) {?>
		<table>
		<thead></thead>
		<tbody>
			<tr>
				<td><?php echo ($indice_reponse." ".$donnees['label_reponse']); ?></td>
				<td><?php if($donnees['validite'] == "1"){ echo ("/ vrai");} else {echo ("/ faux");}?></td>
			</tr>
			<?php $_SESSION["indice_reponse"] = $indice_reponse;
			 $indice_reponse=+1;
			//echo $this_id_qcm;?>
			
		</tbody>
	</table><br>
	
</tbody></table>


<!-- <form action="traitement_valider_reponse.php" method="POST"> -->
			<!--affichage de la liste des questions dans un select-->
			<?php } ?>
			<?php
			include('connexion.php');
			$reponse = $linkpdo->query("SELECT label_reponse, id_reponse, validite FROM reponse, question 
			where id_question = `reponse`.`id_question_fk` and id_question = $question");?>

			<select title ="choississez dans la liste" 
			<?php echo'name= "liste_de_questions'.$indice_question.'">';?>
			 >
			 <?php foreach ($reponse as $data)
			
			 //changement a operer ci dessous, le id reponse ne convient pas en value?
				{echo '<option value="' . $data['id_reponse'] . '">' . $data['label_reponse'] . '</option>';}
			?></select>
			


<?php } ?>
<?php

$req_afficher_qcm->closeCursor();
$_SESSION["indice_question"] = $indice_question;
?><br><br><br>
<input type="submit" value= "valider vos réponses?" name="repondre_question">
</form>

<a href="accueil_prof.php">Retour</a>
</body>
</html>
<?php } ?>
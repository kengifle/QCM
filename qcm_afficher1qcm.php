<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<!--HTML***FORMULAIRE TRAITE SUR CETTE PAGE-->

<head>
	<meta charset="UTF-8">
	<title>affichage questions</title>
</head>

<body>
	<?php include('connexion.php');?>
	<!--formulaire-->
	<form action="qcm_afficher1qcm.php" method="POST">
		<!--affichage de la liste des qcm dans un select-->
		<?php include('connexion.php');
$reponse = $linkpdo->query("SELECT label_qcm, id_qcm_fk, id_user_fk FROM qcm");
?>
		<select title="choississez dans la liste" name="liste_de_qcm">
			<?php
foreach ($reponse as $data)
{echo '<option value="' . $data['id_qcm_fk'] . '">' . $data['label_qcm'] . '</option>';}
?>
		</select>
		<input type="submit" value="afficher ce qcm ?" name="validation_recherche_qcm">
	</form>
	<a href="accueil_prof.php">Retour</a>
</body>
<?php include "footer.html"?>

</html>

<!--PHP***TRAITEMENT DU FORMULAIRE DE CETTE PAGE-->

<?php if(isset($_POST['validation_recherche_qcm'])){include('connexion.php');
	//recuperation id qcm depuis le formulaire
	$this_id_qcm =  $_POST['liste_de_qcm'];
	//requete pour afficher les questions du qcm
	$req_afficher_qcm = $linkpdo->query("SELECT  id_question, label_question FROM `contenir`, `question` WHERE `id_qcm_fk` = $this_id_qcm and `contenir`.`id_question_fk`= `question`.`id_question`");
	//requete pour obtenir le nom du qcm et l'afficher
	$req_nom_qcm = $linkpdo->query("SELECT label_qcm from qcm where id_qcm_fk = $this_id_qcm");
	$data = $req_nom_qcm->fetch();
	echo $data["label_qcm"];?>
<?php
	if (!$req_afficher_qcm) {echo ("ERREUR SYSTEME") ;}
	$indice_question = 1;
	while ($donnees = $req_afficher_qcm->fetch()) {?>
<br>
<table border="1">
	<tbody>
		<table>
			<!--question-->
			<tr>
				<td>
					<?php echo ("Question n° : ".$indice_question);
		$question = $donnees['id_question']; ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo ($donnees['label_question']); ?>
				</td>
			</tr>
			<?php $indice_question++;?>
		</table>
		<!--réponses-->
		<p>Reponses possibles :</p>
		<?php $req_afficher_reponses = $linkpdo->query("SELECT distinct  `id_reponse`, `label_reponse`, `validite`, `reponse`.`id_question_fk` FROM question, qcm, contenir, reponse where $question = `reponse`.`id_question_fk` and `reponse`.`id_question_fk`= `contenir`.`id_question_fk` and `contenir`.`id_qcm_fk` = $this_id_qcm");
		$indice_reponse = 1;
		while ($donnees = $req_afficher_reponses->fetch()) {?>
		<table>
			<thead></thead>
			<tbody>
				<tr>
					<td>
						<?php echo ($indice_reponse.') '); ?>
					</td>
					<td>
						<?php echo ($donnees['label_reponse']); ?>
					</td>
					<td>
						<?php if($donnees['validite'] == "1"){ echo ("/ vrai");} else {echo ("/ faux");}?>
					</td>
				</tr>
				<?php $indice_reponse++;?>
			</tbody>
		</table>
	</tbody>
</table>
<?php } ?>
<?php } ?>
<?php
			// Principe : tant qu'il reste des donnees dans le tab de resultats de la req d'affichage des questions d'un qcm donné,
			//on affiche un tableau pour chaque question puis un tableau avec chacune des réponses à cette question
			//les questions et leurs réponses sont numérotées pour l'affichage
			//la validité de chaque réponse est affichée sous forme textuelle
			$req_afficher_qcm->closeCursor();}
			?>
<?php session_start()?>
<?php if(isset($_POST['validation_recherche_qcm'])){include('connexion.php');
//recuperation id qcm depuis le formulaire
$this_id_qcm =  $_POST['liste_de_qcm'];
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
$indice_question = 1;
while ($donnees = $req_afficher_qcm->fetch()) {?>
<table border ="1">
	<p>Question :</p>
	<tbody>
		<table>
			<tr>
				<td><?php echo ("question no : ".$indice_question);
				$question = $donnees['id_question']; ?></td>
				<tr><td><?php echo ($donnees['label_question']); ?></td></tr>
			</tr>
			<?php $indice_question++;
			//echo $this_id_qcm;?>
		</table>
		<p>Reponses possibles</p>
		<?php $req_afficher_reponses = $linkpdo->query("SELECT distinct  `id_reponse`, `label_reponse`, `validite`, `reponse`.`id_question_fk` FROM question, qcm, contenir, reponse where $question = `reponse`.`id_question_fk` and `reponse`.`id_question_fk`= `contenir`.`id_question_fk` and `contenir`.`id_qcm_fk` = $this_id_qcm");
		$indice_reponse = 1;
		while ($donnees = $req_afficher_reponses->fetch()) {?>
		<table>
		<thead></thead>
		<tbody>
			<tr>
				<td><?php echo ($indice_reponse); ?></td>
				<td><?php echo ($donnees['label_reponse']); ?></td>
				<td><?php if($donnees['validite'] == "1"){ echo ("/ vrai");} else {echo ("/ faux");}?></td>
			</tr>
			<?php $indice_reponse++;
			//echo $this_id_qcm;?>
		</tbody>
	</table>
</tbody></table>
<?php } ?>
<?php } ?>
<?php
$req_afficher_qcm->closeCursor();}
?>
<a href="accueil_prof.php">Retour</a>
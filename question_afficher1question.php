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
<form action="question_afficher1question.php" method="POST">
<?php
include('connexion.php');
$reponse = $linkpdo->query("SELECT id_question, label_question FROM question");?>	
<select title ="liste_de_questions" name="liste_de_questions"><?php
foreach ($reponse as $data)
{
    echo '<option value="' . $data['id_question'] . '">' . $data['label_question'] . '</option>';
}
?></select>
<input type="submit" value= "afficher la question?"" name="validation_recherche_question">
</form>

<?php
if(isset($_POST['validation_recherche_question'])){
				include('connexion.php');
				$this_id_question = $_POST['liste_de_questions'];

$reponse = $linkpdo->query("SELECT * FROM question where id_question = $this_id_question");?>
  <table>
	<thead>
	<tr>	
		<th>id_question</th>
		<th>label_question</th>
		<th>user_question</th>
		<th>theme_question</th>
	</tr>
</thead>
<tbody>
	<?php
// On affiche le resultat

 while ($donnees = $reponse->fetch()) {?>
			<?php?>
			<tr>
				<td><?php echo ($donnees['id_question']); ?></td>
				<td><?php echo ($donnees['label_question']); ?></td>
				<td><?php echo ($donnees['id_user_fk']); ?></td>
				<td><?php echo ($donnees['id_theme_fk']); ?></td>
			</tr>
			<?php } ?>   
<table>
<thead>
	<tr>	
		<th>id_reponse</th>
		<th>label_reponse</th>
		<th>validite</th>
		<th>id_question_fk</th>
	</tr>
</thead>
<tbody>

<?php
$reponse->closeCursor();
?>
<?php
$reponse2 = $linkpdo->query("SELECT * FROM reponse where id_question_fk = $this_id_question");
// On affiche le resultat
 while ($donnees2 = $reponse2->fetch()) {?>
			<?php?>
			<tr>
				<td><?php echo ($donnees2['id_reponse']); ?></td>
				<td><?php echo ($donnees2['label_reponse']); ?></td>
				<td><?php echo ($donnees2['validite']); ?></td>
				<td><?php echo ($donnees2['id_question_fk']); ?></td>
			</tr>
			<?php } ?>  

</tbody></table>
<?php
$reponse2->closeCursor();}
?>
</tbody></table>


</form>
</body>
</html>
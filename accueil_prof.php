<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ACCUEIL : Professeurs</title>
	<?php include "header.html"?> 
</head>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>QcManiax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>QCManiax</h1>      
    	<!--utilisation de la variable de session nom_user-->
	<p><a><?php echo 'Bienvenue, Mme ou M  '.$_SESSION['login_user'].' , sur ce playground de QCM.';?></a></p>
	<p>Vous êtes actuellement connecté(e) en tant qu'enseignant.</p>
  </div>
  <div class = row>
  <div class="col-md 4">
  <div class="page-header">
    <h1>Questions</h1>      
  
<p><a href="question_afficher1question.php">Voulez-vous afficher une question en stock?</a></p>
  <p><a href="question_ajouter.php">Voulez vous saisir une nouvelle question?</a><p>

		<form action="question_afficher_toutes.php" method="POST">
		<p>Voulez-vous afficher les questions pour un thème particulier?</a></p>
		<div>
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
			<input type="submit" name="ok" value ="afficher">
</div>
		</form>
		
</div></div>
<div class="col-md 4">
  <div class="page-header">
    <h1>Qcm</h1>      
  

  <p><a href="qcm_afficher1qcm.php">Voulez-vous afficher un Qcm en stock?</a></p>
		<p><a href="qcm_ajouter.php">Voulez vous créer un nouveau Qcm ?</a></p>
		<p><a href="qcm_ajouter_1question.php">Voulez ajouter une question à un Qcm ?</a></p>   
</div></div>
<div class="col-md 4">
  <div class="page-header">
    <h1>Notes</h1>      
  
  <p>Consultez les notes de vos élèves.</p>            
</div></div>
</div>

  <p></p>      
  <p></p>      
</div>

</body>
</html>



<?php include "footer.html"?>
</html>
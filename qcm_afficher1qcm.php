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
		<form action="traitement_qcm_afficher1qcm.php" method="POST">
			<!--affichage de la liste des qcm dans un select-->
			<?php
			include('connexion.php');
			$reponse = $linkpdo->query("SELECT label_qcm, id_qcm_fk, id_user_fk FROM qcm");?>
			<select title ="choississez dans la liste" name="liste_de_qcm"><?php
				foreach ($reponse as $data)
				{echo '<option value="' . $data['id_qcm_fk'] . '">' . $data['label_qcm'] . '</option>';}
			?></select>
			<input type="submit" value= "afficher ce qcm ?" name="validation_recherche_qcm">
		</form>
		</body>
		<?php include "footer.html"?>
	</html>
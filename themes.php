<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php include "header.php"?>


	<script type="text/javascript">
		// affiche/cache le form sur lequel l'utilisateur clique et cache les autres
		function cacherForm(bouton, idToDisplay, idToHide1, idToHide2) {
			var divToDisplay = document.getElementById(idToDisplay);
			var divToHide1 = document.getElementById(idToHide1);
			var divToHide2 = document.getElementById(idToHide2);
			if (divToDisplay.style.display == "none") {
				divToDisplay.style.display = "block";
				divToHide1.style.display = "none";
				divToHide2.style.display = "none";
			} else {
				divToDisplay.style.display = "none";
				divToHide1.style.display = "none";
				divToHide2.style.display = "none";
			}
		}

		function afficherListe(bouton, idToDisplay) {
			var listToDisplay = document.getElementById(idToDisplay);
			if (listToDisplay.style.display == "none") {
				listToDisplay.style.display = "block";
				console.log("affiche", listToDisplay.style.display);
			} else {
				listToDisplay.style.display = "none";
				console.log("affiche pas", listToDisplay.style.display);
			}
		}

		// cache les messages informatifs au bout de 2s
		function cacherInfo() {
			document.getElementById("displayInfo").style.display = "none";
		}
		setTimeout(cacherInfo, 2000);
	</script>
</head>

<body>
	<div>
		<title>Gestion des thèmes</title>
		<input type="button" name="newTheme" value="Créer un nouveau thème" onclick="cacherForm(this, 'formCreate', 'formModify', 'formDelete')">
		<input type="button" name="modifyTheme" value="Modifier un thème existant" onclick="cacherForm(this, 'formModify', 'formCreate', 'formDelete');
			afficherListe(this, 'affichageThemes');">
		<input type="button" name="deleteTheme" value="Supprimez un thème" onclick="cacherForm(this, 'formDelete', 'formModify', 'formCreate');
			afficherListe(this, 'affichageThemes')">
	</div>
	<form id="formCreate" action="themes.php" method="post" style="display:none;">
		<div>Saisissez un nouveau thème : <input type="text" name="label"></div>
		<div>Valider : <input type="submit" name="create" value="Valider"></div>
	</form>
	<form id="formModify" action="themes.php" method="post" style="display:none;">
		<div>Valider : <input type="submit" name="modifyTheme" value="Valider"></div>
	</form>
	<form id="formDelete" action="themes.php" method="post" style="display:none;">
		<div>Valider : <input type="submit" name="delete" value="Valider"></div>
	</form>
	<?php
			// Connexion à la base de données
			if(isset($_POST['modifyTheme']) || isset($_POST['delete'])){
				include('connexion.php');
				
				// Requête des thèmes enregistrés en base
				$themes = $linkpdo->query("SELECT * FROM theme");
		
				// On affiche le resultat
				while ($donnees = $themes->fetch()) {
					echo '<table id="affichageThemes" style="display:none;"><tr>';
						echo '<td>'.$donnees['id_theme'].'</td>';
						echo '<td>'.$donnees['label_theme'].'</td>';
					echo '</tr></table>';
				}
				$themes->closeCursor();
			}
		?>
	<?php	
			// Insertion d'un nouveau theme dans la base
			if(isset($_POST['create'])){
				$req = $linkpdo->prepare('INSERT INTO theme (label_theme) VALUES (:label)');
				$label = $_POST['label'];
				$req->bindParam(':label', $label);
				if($req->execute()) {
					echo "<p id='displayInfo' class='alert alert-success'>Le thème '$label' a bien été enregistré.</p>";
				} else {
					echo "<p id='displayInfo' class='alert alert-warning'>Le thème '$label' n'a pas pu être enregistré.</p>";
				}
					$req->closeCursor();
			}
		?>
</body>

</html>
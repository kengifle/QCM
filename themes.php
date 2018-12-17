<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<?php include "header.php"?>


		<script type="text/javascript">

			// cache les messages informatifs au bout de 2s
			function cacherInfo() {
				document.getElementById("displayInfo").style.display = "none";
			}
			setTimeout(cacherInfo, 2000);
		</script>
	</head>

	<body>
		<form class="row" style="margin-bottom: 10px" id="formDisplay" action="themes.php" method="post">
			<div>Nom du thème : <input type="text" name="label"></div>
			<input style="margin-left: 10px" type="submit" name="newTheme" value="Créer un nouveau thème">
		</form>
		<?php	
			// Insertion d'un nouveau theme dans la base
			if(isset($_POST['newTheme'])){
				include('connexion.php');
				$req = $linkpdo->prepare('INSERT INTO theme (label_theme) VALUES (:label)');
				$label = $_POST['label'];
				$req->bindParam(':label', $label);
				if($req->execute()) {
					echo "<p style='margin-right: 75%' id='displayInfo' class='alert alert-success'>Le thème '$label' a bien été enregistré.</p>";
				} else {
					echo "<p style='margin-right: 75%' id='displayInfo' class='alert alert-warning'>Le thème '$label' n'a pas pu être enregistré.</p>";
				}
					$req->closeCursor();
			}
		?>
	</body>

</html>
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Login</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="global.css">

	</head>

	<body>
		<div class="center-element">
			<form action="index.php" method="post">
				<legend class="center-element">Bienvenue</legend>
				<div class="center-element"><label>Identifiant</label><input id="selectOnFocus1" type="text" name="login"></div>
				<div class="center-element"><label>Mot de passe</label><input id="selectOnFocus2" type="password" name="password"></div>
				<div class="center-element"><input type="submit" name="validation_login" value="Se connecter"></div>
			</form>
		</div>


		<script>
			document.getElementById("selectOnFocus1").addEventListener("focus", function selectText($event) {
					console.log("cuicui");
					$event.target.select();
				}
			);
			document.getElementById("selectOnFocus2").addEventListener("focus", function selectText($event) {
					console.log("cuicui");
					$event.target.select();
				}
			);
		</script>
		<!--//si bouton submit :
			//connexion à la base
			//preparation de requête sur la présence d'une ligne 'login + mdp' dans la base
			//Exécution de la requête avec les paramètres passés sous forme de tableau associatif
			//$data récupère le résultat de la requête, si il y en a un, sous forme de tableau
			//pas besoin de parcours : si $data existe, authentification ok-->
		<?php
			if(isset($_POST['validation_login'])){
				include('connexion.php');
				//requete préparée sur la presence dans la base du combo id_user/loggin avec les user input en entrée
				$req = $linkpdo->prepare('SELECT role_user, id_user, login_user
				FROM user WHERE login_user = :login AND mdp_user= :password');
				$req->execute(array('login' => $_POST['login'], 'password' => $_POST['password']));
				$data= $req->fetch();
				if ($data) {
					//si acces autorisé
					//recuperation du nom, de l'id user et du role user dans des variables de session
					$_SESSION['login_user'] = $data['login_user'];
					$_SESSION['role_user'] = $data['role_user'];
					$_SESSION["id_user"]=$data['id_user'];
					//redirection selon le role
					switch ($data['role_user']) {
						case "prof" :
						header("Location: accueil_prof.php");
							break;
						case "etu":
						header("Location: accueil_etu.php");
							break;
						default :
							echo 'Erreur. Vérifiez vos identifiants puis essayez à nouveau.';
							break;
					}
				} else {
					echo('Erreur. Vérifiez vos identifiants puis essayez à nouveau.');
				}
			}
		?>
	</body>

</html>
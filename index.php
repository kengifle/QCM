<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>
	<div>
		<form action="index.php" method="post">
			<fieldset>
				<legend>Bonjour.</legend>
				<div><input type="text" name="login" value="entrez votre nom svp"></div>
				<div><input type="password" name="password" value="mdp_svp"></div>
				<div><input type="submit" name="validation_login" value="valider"></div>
			</fieldset>
		</form>
	</div>
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
				} else { echo('Erreur. Vérifiez vos identifiants puis essayez à nouveau.');}?>
</body>
<?php }?>

</html>
<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
			<div>
			<form action="index.php" method="post" >
				<fieldset>
					<legend>Bonjour.</legend>
					<div><input type="text" name="login" value="entrez votre nom svp"></div>
					<div><input type="password" name ="password" value ="mdp_svp"></div>
					<div><input type="submit" name="validationLogin" value="valider"></div>
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
			if(isset($_POST['validationLogin'])){
				include('connexion.php');
				//recuperation du login dans une variable de session
				$_SESSION["nom_user"] = $_POST['login'];
				$req = $linkpdo->prepare('SELECT role_user, id_user FROM user WHERE login_user = :login AND mdp_user= :password');
				$req->execute(array('login' => $_POST['login'], 'password' => $_POST['password']));
				$data= $req->fetch();
				if ($data) {
					var_dump($data);
					//affichage de la case role_user du tableau $data, alimenté par le fetch sur le résultat de la requête $req
					$_SESSION['role_user'] = $data['role_user'];
					//recuperation de l'id user dans une variable de session
					$_SESSION["id_user"]=$data['id_user'];
					//acces à l'accueil
					if ($_SESSION['role_user'] = "prof"){
					header("Location: accueil_prof.php");}
					if ($_SESSION['role_user'] = "etu"){
						header("Location: accueil_etu.php");}

					} else echo('Erreur. Vérifiez vos identifiants puis essayez à nouveau.');}?>
	</body>
</html>

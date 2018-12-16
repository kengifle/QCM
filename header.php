<link href="bootstrap\css\darkyflat.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="nav navbar-brand" href="<?php if($_SESSION['role_user']!='etu') {echo " accueil_prof.php";}
                    else { echo "accueil_etu.php" ;}?>">La référence du QCM sur mesure</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="<?php if($_SESSION['role_user']!='etu') {echo " accueil_prof.php";} else {
                        echo "accueil_etu.php" ;}?>">Accueil</a></li>
                <li><a href="deconnexion.php"> Se deconnecter </a></li>
                <li><a href="">Aide</a></li>
                <li><a href="#">QCM</a></li>
                <li><a href="#">Notes</a></li>
            </ul>
        </div>
    </nav>
</body>

</html>
<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ACCUEIL : ETUDIANT</title>
  <?php include "header.php"?>
</head>
<div class="container">
  <div class="jumbotron">
    <h1>QCManiax</h1>
    <!--utilisation de la variable de session nom_user-->
    <p><a>
        <?php echo 'Bienvenue, Mme ou M  '.$_SESSION['login_user'].' , sur ce playground de QCM.';?></a></p>
    <p>Vous êtes actuellement connecté(e) en tant qu'étudiant.</p>
  </div>
  <div class=row>
    <div class="col-md 4">
      <div class="page-header">
        <h1>QCM</h1>
        <p><a href="qcm_repondre_qcm.php">Voulez-repondre à un qcm ?</a></p>
      </div>
    </div>
    <div class="col-md 4">
    </div>
    <div class="col-md 4">
      <div class="page-header">
        <h1>Notes</h1>
        <p>Consultez vos notes.</p>
      </div>
    </div>
  </div>
  <p></p>
  <p></p>
</div>

<body>
</body>
<?php include "footer.html"?>

</html>
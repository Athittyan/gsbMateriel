<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>  
<div class="container">
  <?php
try
{
  $PARAM_hote = 'localhost'; // le chemin vers le serveur
  $PARAM_port = '3306';
  $PARAM_nom_bd = 'materiel'; // le nom de votre base de donn�es
  $PARAM_utilisateur = 'root'; // nom d'utilisateur pour se connecter
  $PARAM_mot_passe = 'root';
  $bdd = new PDO('mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
<form method="post" action="">
  <br><br>
  <legend>Choisir Id du visiteur à modifier :</legend>
  <select name="Id"> 
  <?php
    $reponse = $bdd->query('SELECT Id FROM materiel');
    while ($identifiant = $reponse->fetch())
    {
  ?>
      <option value="<?php echo $identifiant['Id']; ?>"> <?php echo $identifiant['Id']; ?></option>
  <?php
    }
  ?>
  </select>
  <input type="hidden" name="etape" value="3" />
  <fieldset>
    <label>Marque :</label>
    <input type="text" name="Marque"  /><br />
    <label>modèle :</label>
    <input type="text" name="Modele"  size="20" /><br />
    <label>dimension :</label>
    <input type="text" name="Dimension"  /><br />
    <label>type :</label>
    <input type="text" name="Type"  /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Modifier</button>
  <button type="reset" class="btn">Annuler</button>
</form>
</div>
</body>
</html>
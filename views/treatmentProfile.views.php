<!-- cette page permet de recuperer les données ussues du formulaire de modification du profil et de les mettre à jour dans la base de données -->
<?php

if (!empty($_POST)) {

  //on verifit que nos variables sont definies et ne sont pas vide
  if (
    isset($_POST["nom"], $_POST["mail"],$_POST["pass"])
    && !empty($_POST["nom"]) && !empty($_POST["mail"]) && !empty($_POST["pass"]))
   {
    $nom = strip_tags($_POST["nom"]);
    $email = strip_tags($_POST["mail"]);
    $pass = strip_tags($_POST["pass"]);
    
    require_once 'database/database.php';
    //si les POST ne sont pas vide alors on met à jour les valeurs dans la base de données
    $sql = $db->prepare('UPDATE clients set nom=:nom , email=:email ,motpasse=:pass WHERE client_id=4');
    
    $sql->bindValue(':nom',$nom,PDO::PARAM_STR);
    $sql->bindValue(':email',$email,PDO::PARAM_STR);
    $sql->bindValue(':pass',$pass,PDO::PARAM_STR);
    $sql->execute();

    if ($sql->rowCount()>0) {
        echo "la mise à jour effectuée avec succès";
        header('Location: home.php');
            exit;
    } else {
        echo "la mise à jour à échouée";
    }

  } else {
    die('formulaire incomplet');
  }
}
?>
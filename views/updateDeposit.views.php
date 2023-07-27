<!-- cette page permet de recuperer les données ussues du formulaire de depot et de les mettre à jour dans la base de données -->
<?php

if (!empty($_POST)) {

  //on verifit que nos variables sont definies et ne sont pas vide
  if (
    isset($_POST["numero"], $_POST["montant"])
    && !empty($_POST["numero"]) && !empty($_POST["montant"]))
   {
    $numero = strip_tags($_POST["numero"]);
    $montant = strip_tags($_POST["montant"]);
    
    require_once 'database/database.php';
    //si les POST ne sont pas vide alors on met à jour les valeurs dans la base de données
    $sql = $db->prepare('UPDATE comptes set solde=solde+ :montant WHERE compte_id=:id');
    
    $sql->bindValue(':montant',$montant,PDO::PARAM_INT);
    $sql->bindValue(':id',$numero,PDO::PARAM_INT);
    $sql->execute();

    if ($sql->rowCount()>0) {
        echo "la mise à jour effectuée avec succès";
        header('Location: home.php');
            exit;
    } else {
        echo "la mise à jour à échouée";
    }

    
    // $client_id = $db->lastInsertId();

    // // Préparation de la requête d'insertion dans la table comptes
    // $sql = "INSERT INTO comptes (client_id, type_compte, solde, date_ouverture) VALUES (:client_id, :type_compte, :solde, NOW())";
    // $query = $db->prepare($sql);

    // // Liaison des paramètres
    // $query->bindValue(":client_id", $client_id, PDO::PARAM_INT);
    // $query->bindValue(":type_compte", $type_compte, PDO::PARAM_STR);
    // $query->bindValue(":solde", $solde, PDO::PARAM_STR);

    // // Exécution de la requête
    // $query->execute();


    // header('Location:register.php');
  } else {
    die('formulaire incomplet');
  }
}
?>
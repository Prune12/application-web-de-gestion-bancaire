<!-- cette page permet de recuperer les données ussues du formulaire d'inscription et de l'enregistrer dans la base de données -->
<?php

if (!empty($_POST)) {

  //on verifit que nos variables sont definies et ne sont pas vide
  if (
    isset($_POST["nom"], $_POST["adresse"], $_POST["numero"], $_POST["mail"], $_POST["pass"], $_POST["montant"], $_POST["typecompte"])
    && !empty($_POST["nom"]) && !empty($_POST["adresse"]) && !empty($_POST["numero"]) && !empty($_POST["mail"]) && !empty($_POST["pass"]) && !empty($_POST["montant"]) && !empty($_POST["typecompte"])
  ) {
    $nom = strip_tags($_POST["nom"]);
    $adresse = strip_tags($_POST["adresse"]);
    $numero = strip_tags($_POST["numero"]);
    $mail = strip_tags($_POST["mail"]);
    $pass = strip_tags($_POST["pass"]);
    $solde = strip_tags($_POST["montant"]);;
    $type_compte = strip_tags($_POST["typecompte"]);;


    require_once 'database/database.php';
    //si les POST ne sont pas vide alors on insere les valeurs dans la base de données
    $sql = "INSERT INTO clients (nom,adresse,telephone,email,motpasse) VALUES(
      :nom, :adresse,:telephone,:email,:motpasse)";
    $query = $db->prepare($sql);

    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":adresse", $adresse, PDO::PARAM_STR);
    $query->bindValue(":telephone", $numero, PDO::PARAM_STR);
    $query->bindValue(":email", $mail, PDO::PARAM_STR);
    $query->bindValue(":motpasse", $pass, PDO::PARAM_STR);

    $isexecute = $query->execute();

    $client_id = $db->lastInsertId();

    // Préparation de la requête d'insertion dans la table comptes
    $sql = "INSERT INTO comptes (client_id, type_compte, solde, date_ouverture) VALUES (:client_id, :type_compte, :solde, NOW())";
    $query = $db->prepare($sql);

    // Liaison des paramètres
    $query->bindValue(":client_id", $client_id, PDO::PARAM_INT);
    $query->bindValue(":type_compte", $type_compte, PDO::PARAM_STR);
    $query->bindValue(":solde", $solde, PDO::PARAM_STR);

    // Exécution de la requête
    $query->execute();


    header('Location:register.php');
  } else {
    die('formulaire incomplet');
  }
}
?>
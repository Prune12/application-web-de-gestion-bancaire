<!-- cette page recupère les donnees issues du formulaire de connexion et verifit si l'utilisateur à belle et bien un compte -->
<?php
//session_start();
if (!empty($_POST)) {

    
    // Vérifiez si le formulaire a été soumis
    if (isset($_POST["mail"],$_POST["pass"]) && !empty($_POST["mail"]) && !empty($_POST["pass"])) {
        // Récupérez les valeurs du formulaire
        $email = strip_tags($_POST["mail"]);
        $password = strip_tags($_POST["pass"]);

        require_once "database/database.php";

        // Vérifiez si les informations d'identification sont valides
        $query = "SELECT * FROM clients WHERE email=:mail AND motpasse=:pass";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':mail', $email, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $password, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
           // Les informations d'identification sont valides
        // Récupérez l'identifiant de l'utilisateur à partir des résultats
        $result = $stmt->fetchAll();
        //$client_id = $row['id']; // Remplacez 'id' par le nom de la colonne contenant l'identifiant de l'utilisateur
        // Stockez l'identifiant de l'utilisateur dans une variable de session
        //$_SESSION['user_id'] = $client_id;
        // Redirigez l'utilisateur vers la page d'accueil
        header('Location: home.php');
        exit;
        } else {
            // Les informations d'identification ne sont pas valides, affichez un message d'erreur
            echo "Adresse e-mail ou mot de passe incorrect";
        }
    }}
?>



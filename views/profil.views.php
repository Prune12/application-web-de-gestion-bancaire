<!-- page de vue du profil utilisateur -->
<?php

include "database/database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="views/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <?php include "partials/nav.php"; ?>
    <div id="layoutSidenav">
        <?php include "partials/sidebar.php"; ?>
        <div id="layoutSidenav_content">
        <?php
            $sql = "SELECT nom,email,motpasse FROM clients WHERE client_id=4";
            $query = $db->prepare($sql);
            //$stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
            $query->execute(); 
            $result=$query->fetchAll();  
            if (!empty($result)) {
            
            ?>
            <main>
            <?php
                    foreach ($result as $row) {
                    ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <p>PROFIL UTILISATEUR</p>
                    </div>
                    <form method="POST" action="treatmentProfile.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nom" placeholder="nom" value="<?php echo $row['nom']?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">adresse email</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" name="mail" placeholder="mail" value="<?php echo $row['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">mot de passe </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="password" value="<?php echo $row['motpasse']?>">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">modifier</button>
                        </div>
                    </form>
                </div>
                <?php }; ?>
        </div>
        </main>
        <?php }; ?>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="views/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="views/assets/demo/chart-area-demo.js"></script>
    <script src="views/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="views/js/datatables-simple-demo.js"></script>
</body>

</html>

 
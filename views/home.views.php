<!-- page de vue de la home page -->
<?php
// Initialisez la session
//session_start();

// Récupérez l'identifiant de l'utilisateur à partir de la variable de session
//$user_id = $_SESSION['user_id'];

// Récupérez les informations de cet utilisateur à partir de la base de données
// Connectez-vous à la base de données
include "database/database.php";
//$userInfo=$_SESSION['utilisateur'];
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
            $sql = "SELECT type_compte,solde,date_ouverture FROM comptes WHERE client_id=4";
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
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Dashboard</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">type de compte</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#"><?php echo $row['type_compte'] ?></a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">solde</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#"><?php echo $row['solde'] ?></a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">date d'ouverture</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="#"><?php echo $row['date_ouverture'] ?></a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
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
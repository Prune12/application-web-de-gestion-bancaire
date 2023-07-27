<!-- page de vue du formulaire de retrait d'argent -->
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
            <main>
                <div class="card card-primary">
                    <div class="card-header">
                        <P>FAIRE UN RETRAIT D'ARGENT</P>
                    </div>
                    <form method="POST" action="updateWithdrawal.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numero du compte/identifiant du compte</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="numero" placeholder="valeur">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Montant à retirer(FCFA)</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="montant" placeholder="montant">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
        </div>
        </main>
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
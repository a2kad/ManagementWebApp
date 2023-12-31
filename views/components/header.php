<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Web App</title>

</head>

<body class="d-flex flex-column h-100">
    <header class="p-3 text-bg-dark shadow">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="../assets/image/erp.png" class="bi me-2" width="40" height="40" role="img">
                    </img>
                </a>
                <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                </div>
                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                </div>
                <?php

                //var_dump($_SESSION);
                if (isset($_SESSION['user'])) { ?>
                    <div class="text-end">
                        <a href="../controllers/controller-gerer.php" class="btn btn-outline-light me-2"><?= $_SESSION['user']['name'] ?></a>
                        <a href="../helpers/killsession.php" type="button" class="btn btn-warning">Déconnecter</a>
                    </div>

                <?php } else { ?>
                    <div class="text-end">
                        <a href="../index.php" type="button" class="btn btn-outline-light me-2">Se connecter</a>
                        <a href="../controllers/controller-registration.php" type="button" class="btn btn-warning">S'inscrire</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </header>
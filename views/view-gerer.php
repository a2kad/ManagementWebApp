<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-lg-6">

                <?php if (isset($_SESSION['user'])) {
                ?>
                    <h1><?= $_SESSION['user']['name'] ?>, bienvenue sur compte personnel</h1><br>
                    <?php
                    if ($_SESSION['user']['id_type_user'] == 2) {
                    ?>
                        <a href="../controllers/controller-newfrais.php" class="btn btn-outline-dark">Nouveau Frais</a>
                        <a href="../controllers/controller-frais.php" class="btn btn-outline-dark ms-2">Gérer Les Frais</a>
                        <a href="../controllers/controller-admin.php" class="btn btn-outline-dark ms-2">Gérer Les Utilisateurs</a>
                    <?php
                    } else if ($_SESSION['user']['id_type_user'] == 1) { ?>
                        <a href="../controllers/controller-newfrais.php" class="btn btn-outline-dark">Nouveau Frais</a>
                        <a href="../controllers/controller-frais.php" class="btn btn-outline-dark ms-2">Gérer Les Frais</a>
                <?php
                    }
                } ?>
            </div>
        </div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
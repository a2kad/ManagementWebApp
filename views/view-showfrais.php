<?php include "components/header.php" ?>

<main class="form-signin w-100">
    <div class="container text-left">

        <div class="row align-items-center">
            <div class="col-8 p-3">
                <?php
                //var_dump($_GET);
                foreach (Frais::getOneFrais($_GET['user_id']) as $userFrais) {
                    //var_dump($userFrais);
                ?>
                    <?php if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['id_type_user'] == 2) { ?>
                            <h1> Frais no. <?= $userFrais['id'] ?></h1>
                            <hr>
                            <p class="h4">Nom : <?= $userFrais['lastname'] ?></p>
                            <p class="h4">Prénom : <?= $userFrais['name'] ?></p>
                            <p class="h6">Téléphone : <?= $userFrais['tel'] ?></p>
                            <p class="h6">E-mail : <?= $userFrais['email'] ?></p>
                            <hr>
                            <p class="h6">Motif : <?= ucfirst($userFrais['name_type']) ?></p>
                            <p class="h6">Descruption : <?= $userFrais['motif'] ?></p>
                            <p class="h6">Date : <?= date_format(date_create($userFrais['date']), 'd/m/Y') ?></p>
                            <p class="h6">Montant TTC : <?= $userFrais['montant_ttc'] ?></p>
                            <p class="h6">Montant HT : <?= $userFrais['montant_ht'] ?></p>
                            <form action="" method="post">


                                <select name="status" class="form-select" aria-label="Default select example">
                                    <?php foreach (Frais::getStatus() as $status) { ?>

                                        <option value="<?= $status['id_status'] ?>" <?= $userFrais['id_status'] == $status['id_status'] ? 'selected' : '' ?>><?= $status['name_status'] ?></option>

                                    <?php } ?>
                                </select>
            </div>
            <div class="col-4 p-3">

                <!-- Button trigger modal -->
                <button type="button" class="border border-0 bg-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?= Frais::convertImg($userFrais['justificatif']) ?>" class="img-fluid bg-white border p-2">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Justificatif</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= Frais::convertImg($userFrais['justificatif']) ?>" class="img-fluid">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php  } else if ($_SESSION['user']['id_type_user'] == 1) {
                            if ($_SESSION['user']['id_user'] == $userFrais['id_user']) { ?>
                <h1> Frais no. <?= $userFrais['id'] ?></h1>
                <hr>
                <p class="h4">Nom : <?= $userFrais['lastname'] ?></p>
                <p class="h4">Prénom : <?= $userFrais['name'] ?></p>
                <p class="h6">Téléphone : <?= $userFrais['tel'] ?></p>
                <p class="h6">E-mail : <?= $userFrais['email'] ?></p>
                <hr>
                <p class="h6">Motif : <?= ucfirst($userFrais['name_type']) ?></p>
                <p class="h6">Descruption : <?= $userFrais['motif'] ?></p>
                <p class="h6">Date : <?= date_format(date_create($userFrais['date']), 'd/m/Y') ?></p>
                <p class="h6">Montant TTC : <?= $userFrais['montant_ttc'] ?></p>
                <p class="h6">Montant HT : <?= $userFrais['montant_ht'] ?></p>
                <p class="h6">Statut : <?= $userFrais['name_status'] ?>
        </div>
        <div class="col-4 p-3">

            <!-- Button trigger modal -->
            <button type="button" class="border border-0 bg-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="<?= Frais::convertImg($userFrais['justificatif']) ?>" class="img-fluid bg-white border p-2">
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Justificatif</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="<?= Frais::convertImg($userFrais['justificatif']) ?>" class="img-fluid">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php } else { ?>
        <div class="my-5">
            <p class="h3"><img src="../assets/image/block.png" alt="No haking" width="100px">Bloqué</p>
        </div>
<?php }
                        }
                    } ?>


<?php if (isset($_SESSION['user'])) {
                        if ($_SESSION['user']['id_type_user'] == 2) { ?>

        <div class="text-start">

            <input name="submit" type="submit" class="btn btn-warning mb-2" value="Enregistrer">
            <div class="form-text error"><?= $error['status'] ?? '' ?></div>
            </form>
        </div>
        <div class="text-start"><a href="../controllers/controller-frais.php" type="button" class="btn btn-secondary mb-2">Arrière</a></div>

    <?php  } else if ($_SESSION['user']['id_type_user'] == 1) { ?>
        <div class="text-start"><a href="../controllers/controller-frais.php" type="button" class="btn btn-secondary mb-2">Arrière</a></div>
<?php }
                    } ?>

<?php } ?>
    </div>
    </div>
</main>

<?php include "components/footer.php" ?>
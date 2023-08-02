<?php include "components/header.php" ?>

<main class="form-signin w-100">
    <div class="container text-left">
        <div class="row justify-content-center align-items-center">
            <div class="col col-lg-8">
                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['id_type_user'] == 2) { ?>

                        <?php foreach (Frais::getOneFrais($_GET['refuse']) as $userFrais) { ?>
                            <h1 class="mt-3"> Frais no. <?= $userFrais['id'] ?></h1>
                            <hr>
                            <form action="" method="post">

                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Motif de rejet :</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control shadow <?= $error['motifRejet_red'] ?? '' ?>" name="motifRejet" id="description" rows="3" value="<?= $_POST['motifRejet'] ?? '' ?>"><?= $_POST['description'] ?? '' ?></textarea>
                                        <div class="form-text error"><?= $error['motifRejet'] ?? '' ?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dateFrais" class="col-sm-2 col-form-label">Date de rejet :</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="dateRejet" class="form-control shadow" id="dateFrais" value="<?= date("Y-m-d") ?>">
                                    </div>
                                </div>

                                <div class="text-center mb-2 ">
                                    <button type="submit" class="btn btn-warning shadow">Refuser</button>
                                    <a href="../controllers/controller-showfrais.php?user_id=<?= $userFrais['id'] ?>" type="button" class="btn btn-secondary ms-2 shadow">Annuler</a>
                                    <div class="form-text error"><?= $error['refuse'] ?? '' ?></div>
                                </div>

                            </form>
                            <hr>
                            <p class="h6">Nom : <?= $userFrais['lastname'] ?></p>
                            <p class="h6">Prénom : <?= $userFrais['name'] ?></p>
                            <hr>
                            <p class="h6">Motif : <?= ucfirst($userFrais['name_type']) ?></p>
                            <p class="h6">Descruption : <?= $userFrais['motif'] ?></p>
                            <p class="h6">Montant TTC : <?= $userFrais['montant_ttc'] ?></p>
                            <p class="h6">Date de création : <?= date_format(date_create($userFrais['date']), 'd/m/Y') ?></p>
                            <p class="h6">Justificatif :</p>
                            <img src="<?= Frais::convertImg($userFrais['justificatif']) ?>" class="img-fluid bg-white border p-2 mb-3">
                        <?php } ?>

                    <?php  } else if ($_SESSION['user']['id_type_user'] == 1) { ?>
                        <div class="my-5">
                            <p class="h3"><img src="../assets/image/block.png" alt="No haking" width="100px">Bloqué</p>
                        </div>
                <?php  }
                } ?>
            </div>
        </div>
    </div>
</main>


<?php include "components/footer.php" ?>
<?php include "components/header.php" ?>

<main class="form-signin w-100">
    <div class="container text-center">
        <table class="table table-striped align-middle mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Date</th>
                    <th scope="col">Montant TTC</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Justificatif</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['id_type_user'] == 2) {

                        foreach (Frais::getAllFrais() as $frais) {
                            //var_dump($frais);
                            /* $imgData = $frais['justificatif'];
                            $file = finfo_open();
                            $mimeType = finfo_buffer($file,$imgData,FILEINFO_MIME_TYPE);
                            $base64ImgScr = 'data:'. $mimeType . ';base64,' . $imgData; */
                ?>
                            <tr>
                                <th scope="row"><?= $frais['id'] ?></th>
                                <td><?= $frais['name'] ?></td>
                                <td><?= $frais['lastname'] ?></td>
                                <td><?= $frais['name_type'] ?></td>
                                <td><?= $frais['date'] ?></td>
                                <td><?= $frais['montant_ttc'] ?>&euro;</td>
                                <td><?= $frais['name_status'] ?></td>
                                <td>
                                    <img src="<?= Frais::convertImg($frais['justificatif']) ?>" class="img-thumbnail" width="100px">
                                </td>
                                <td><a href="../controllers/controller-showfrais.php?user_id=<?= $frais['id'] ?>" type="button" class="btn btn-secondary btn-sm">Ouvrir</a></td>
                            </tr>
                        <?php  }
                    } else if ($_SESSION['user']['id_type_user'] == 1) {
                        foreach (Frais::getIndividualFrais($_SESSION['user']['id_user']) as $frais) { ?>
                            <tr>
                                <th scope="row"><?= $frais['id'] ?></th>
                                <td><?= $frais['name'] ?></td>
                                <td><?= $frais['lastname'] ?></td>
                                <td><?= $frais['name_type'] ?></td>
                                <td><?= $frais['date'] ?></td>
                                <td><?= $frais['montant_ttc'] ?>&euro;</td>
                                <td><?= $frais['name_status'] ?></td>
                                <td><img src="<?= Frais::convertImg($frais['justificatif']) ?>" class="img-thumbnail" width="100px">
                                </td>
                                <td><a href="../controllers/controller-showfrais.php?user_id=<?= $frais['id'] ?>" type="button" class="btn btn-secondary btn-sm">Ouvrir</a></td>
                            </tr>
                <?php
                        }
                    }
                } ?>
            </tbody>
        </table>
        <div class="text-start"><a href="../controllers/controller-gerer.php" type="button" class="btn btn-secondary mb-2">Arrière</a></div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
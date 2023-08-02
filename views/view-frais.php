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
                                <td>

                                    <div class="btn-group" role="group">
                                        <a href="../controllers/controller-showfrais.php?id_frais=<?= $frais['id'] ?>" type="button" class="btn btn-warning btn-sm">Ouvrir</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-<?= $frais['id'] ?>">
                                            Supprimer
                                        </button>
                                        <!-- Start of Modal -->
                                        <div class="modal fade" id="modal-<?= $frais['id'] ?>" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation de suppression</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        Voulez-vous vraiment supprimer la note de frais no. <?= $frais['id'] ?> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="" method="post">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <button type="submit" name="del" class="btn btn-danger" value="<?= $frais['id'] ?>">Supprimer</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Modal -->
                                    </div>
                                </td>
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
                                <td><a href="../controllers/controller-showfrais.php?id_frais=<?= $frais['id'] ?>" type="button" class="btn btn-warning btn-sm">Ouvrir</a></td>
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
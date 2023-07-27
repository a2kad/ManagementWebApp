<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Justificatif</th>
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
                                <td><?= $frais['email'] ?></td>
                                <td><?= $frais['tel'] ?></td>
                                <td><img src="<?= Frais::convertImg($frais['justificatif']) ?>" class="img-thumbnail" width="100px">
                                </td>
                            </tr>
                        <?php  }
                    } else if ($_SESSION['user']['id_type_user'] == 1) {
                        foreach (Frais::getIndividualFrais($_SESSION['user']['id_user']) as $frais) { ?>
                            <tr>
                                <th scope="row"><?= $frais['id'] ?></th>
                                <td><?= $frais['name'] ?></td>
                                <td><?= $frais['lastname'] ?></td>
                                <td><?= $frais['email'] ?></td>
                                <td><?= $frais['tel'] ?></td>
                                <td><img src="<?= Frais::convertImg($frais['justificatif']) ?>" class="img-thumbnail" width="100px">
                                </td>
                            </tr>
                <?php
                        }
                    }
                } ?>
            </tbody>
        </table>
        <div class="text-end"><a href="../controllers/controller-gerer.php" type="button" class="btn btn-secondary mb-2">Arrière</a></div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
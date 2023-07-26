<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($_SESSION['user'])) {
                    if ($_SESSION['user']['id_type_user'] == 2) {
                        foreach (Frais::getAllFrais() as $frais) { ?>
                            <tr>
                                <th scope="row"><?= $frais['id_user'] ?></th>
                                <td><?= $frais['name'] ?></td>
                                <td><?= $frais['lastname'] ?></td>
                                <td><?= $frais['email'] ?></td>
                                <td><?= $frais['tel'] ?></td>
                                <td></td>
                            </tr>
                        <?php  }
                    } else if ($_SESSION['user']['id_type_user'] == 1) {
                        foreach (Frais::getIndividualFrais($_SESSION['user']['id_user']) as $frais) { ?>
                            <tr>
                                <th scope="row"><?= $frais['id_user'] ?></th>
                                <td><?= $frais['name'] ?></td>
                                <td><?= $frais['lastname'] ?></td>
                                <td><?= $frais['email'] ?></td>
                                <td><?= $frais['tel'] ?></td>
                                <td></td>
                            </tr>
                <?php
                        }
                    }
                } ?>
            </tbody>
        </table>
        <div class="text-end"><a href="../controllers/controller-gerer.php" type="button" class="btn btn-secondary">Arrière</a></div>
    </div>
    
    </div>
</main>

<?php include "components/footer.php" ?>
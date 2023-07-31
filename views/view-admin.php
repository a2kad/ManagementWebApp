<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <?php if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['id_type_user'] == 2) {
        ?>
                <table class="table table-striped my-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (Users::getAllUsers() as $user) { ?>
                            <tr>
                                <th scope="row"><?= $user['id_user'] ?></th>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['lastname'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['tel'] ?></td>
                                <td><?= $user['type_name'] ?></td>
                            </tr>
                        <?php  } ?>

                    </tbody>
                </table>
            <?php
            } else if ($_SESSION['user']['id_type_user'] == 1) { ?>
                <div class="my-5">
                    <p class="h3"><img src="../assets/image/block.png" alt="No haking" width="100px">Bloqué</p>
                </div>
        <?php
            }
        } ?>
        <div class="text-start"><a href="../controllers/controller-gerer.php" type="button" class="btn btn-secondary">Arrière</a></div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
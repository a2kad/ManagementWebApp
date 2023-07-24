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
                <?php foreach (Users::getAllUsers() as $user) { ?>
                    <tr>
                        <th scope="row"><?= $user['id_user'] ?></th>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['lastname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['tel'] ?></td>
                        <td>
                            <?php if (isset($_SESSION['user'])) {
                                if ($_SESSION['user']['id_type_user'] == 2) {
                            ?>
                                    Admin
                                <?php
                                } else if ($_SESSION['user']['id_type_user'] == 1) { ?>
                                    User
                            <?php
                                }
                            } ?>
                        </td>
                    </tr>
                <?php  } ?>

            </tbody>
        </table>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
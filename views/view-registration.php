<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-lg-4">
                <form method="POST" action="">
                    <h1 class="h3 my-3 fw-normal">Inscription</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow <?= $error['lastname_red']?? '' ?>" name="lastname" id="floatingLastName" placeholder="Doe" value="<?= $_POST['lastname'] ?? '' ?>">
                        <label for="floatingLastName">Nom</label>
                        <div class="form-text error"><?=  $error['lastname']?? '' ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow  <?=  $error['name_red']?? '' ?>" name="name" id="floatingName" placeholder="Jhon" value="<?= $_POST['name'] ?? '' ?>">
                        <label for="floatingName">Prénom</label>
                        <div class="form-text error"><?=  $error['name']?? '' ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control shadow <?=  $error['tel_red']?? '' ?>" name="tel" id="floatingTel" placeholder="0102030405" value="<?= $_POST['tel'] ?? '' ?>">
                        <label for="floatingTel">Téléphone</label>
                        <div class="form-text error"><?=  $error['tel']?? '' ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control shadow <?=  $error['email_red']?? '' ?>" name="email" id="floatingInput" placeholder="name@example.com" value="<?= $_POST['email'] ?? '' ?>">
                        <label for="floatingInput">Adresse e-mail</label>
                        <div class="form-text error"><?=  $error['email']?? '' ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow <?=  $error['password_red']?? '' ?>" name="password" id="floatingPassword" placeholder="Password" value="<?= $_POST['password'] ?? '' ?>">
                        <label for="floatingPassword">Mot de passe</label>
                        <div class="form-text error"><?=  $error['password']?? '' ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow <?=  $error['conformation_red']?? '' ?>" name="conformation" id="floatingPassword" placeholder="Password" value="<?= $_POST['conformation'] ?? '' ?>">
                        <label for="floatingPassword">Confirmez le mot de passe</label>
                        <div class="form-text error"><?=  $error['conformation']?? '' ?></div>
                    </div>
                    <button class="btn btn-warning w-100 py-3 mb-3 shadow" type="submit">S'inscrire</button>
                    <div class="form-text error"><?= $error['bdd'] ?? '' ?></div>
                </form>
            </div>
        </div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
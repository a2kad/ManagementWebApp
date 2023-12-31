<?php include "components/header.php" ?>
<?php if (!isset($_SESSION['user'])) {
?>
    <main class="form-signin w-100 h-100">
        <div class="container h-100 text-center">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col col-lg-4">
                    <form method="POST" action="">
                        <input type="hidden" name="">
                        <h1 class="h3 my-3 fw-normal">Veuillez vous connecter</h1>
                        <div class="form-floating my-2">
                            <input type="email" class="form-control shadow <?= $error['email_red'] ?? '' ?>" name="email" id="floatingInput" placeholder="name@example.com" value="<?= $_POST['email'] ?? '' ?>">
                            <label for="floatingInput">Adresse e-mail</label>
                            <div class="form-text error"><?= $error['email'] ?? '' ?></div>
                        </div>
                        <div class="form-floating my-2">
                            <input type="password" class="form-control shadow <?= $error['password_red'] ?? '' ?>" name="password" id="floatingPassword" placeholder="Password" value="<?= $_POST['password'] ?? '' ?>">
                            <label for="floatingPassword">Mot de passe</label>
                            <div class="form-text error"><?= $error['password'] ?? '' ?></div>
                        </div>
                        <div class="my-3 mx-auto" style="width: 300px;">
                            <div class="g-recaptcha" data-sitekey="6LcBfW0nAAAAAIalEVj7pyrkECIERMaw1CUhMngD"></div>
                            <div class="form-text error"><?= $error['recaptcha'] ?? '' ?></div>
                        </div>
                        <button class="btn btn-warning w-100 py-2 my-2 shadow" type="submit">S'identifier</button>
                        <div class="form-text error"><?= $error['bdd'] ?? '' ?></div>
                        <p class="mt-5 mb-3 text-body-secondary">Si vous n'avez pas de compte, veuillez vous <a href="../controllers/controller-registration.php">inscrire</a></p>
                    </form>
                </div>
            </div>
        </div>

    </main>
<?php
} else {
    header("Location: ../controllers/controller-gerer.php");
    exit;
} ?>
<?php include "components/footer.php" ?>
<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-lg-4">
                <form>
                    <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>
                    <div class="form-floating my-2">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Adresse e-mail</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <button class="btn btn-warning w-100 py-2 my-2" type="submit">S'identifier</button>
                    <p class="mt-5 mb-3 text-body-secondary">Si vous n'avez pas de compte, veuillez vous <a href="../controllers/controller-registration.php">inscrire</a></p>
                </form>
            </div>
        </div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
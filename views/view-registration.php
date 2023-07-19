<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100 text-center">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-lg-4">
                <form>
                    <h1 class="h3 mb-3 fw-normal">Inscription</h1>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="lastname" id="floatingLastName" placeholder="Doe">
                        <label for="floatingLastName">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="floatingName" placeholder="Jhon">
                        <label for="floatingName">Prénom</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Adresse e-mail</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <button class="btn btn-warning w-100 py-2 my-2" type="submit">S'inscrire</button>
                    <p class="mt-5 mb-3 text-body-secondary">Si vous n'avez pas de compte, veuillez vous inscrire</p>
                </form>
            </div>
        </div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
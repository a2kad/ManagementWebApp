<?php include "components/header.php" ?>

<main class="form-signin w-100 h-100">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col col-lg-8">
                <form action="" method="post">
                    <div class="row mb-3">
                        <label for="dateFrais" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="dateFrais" value="<?= date("Y-m-d") ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="motif" class="col-sm-2 col-form-label">Motif</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="motif" aria-label="Default select example">
                                <option selected disabled hidden>Choisissez un motif</option>
                                <?php foreach(Frais::getMotif() as $motif){ ?>
                                <option id="motif" value="<?= $motif['id_type'] ?>"><?= $motif['name_type'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text error" id="showMotifError"></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="montant" class="col-sm-2 col-form-label">Montant TTC</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" id="ttc">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ht" class="col-sm-2 col-form-label">Montant HT<span id="showTVA"></span></label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" id="ht">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">Fichiers de justificatif</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="file" multiple="multiple">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>

            </div>
        </div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
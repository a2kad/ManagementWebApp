<?php include "components/header.php" ?>

<main class="form-signin w-100">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col col-lg-8">
                <h1 class="text-center my-3">Note de frais</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="dateFrais" class="col-sm-2 col-form-label">Date *</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control shadow <?= $error['date_red'] ?? '' ?>" id="dateFrais" value="<?= date("Y-m-d") ?>">
                            <div class="form-text error"><?= $error['date'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="motif" class="col-sm-2 col-form-label">Motif *</label>
                        <div class="col-sm-10">
                            <select name="motif" class="form-select shadow <?= $error['motif_red'] ?? '' ?>" id="motif" aria-label="Default select example">
                                <option selected disabled hidden>Choisissez un motif</option>
                                <?php foreach (Frais::getMotif() as $motif) { ?>
                                    <option id="motif" value="<?= $motif['id_type'] ?>" 
                                    <?= isset($_POST['motif']) && $_POST['motif'] == $motif['id_type'] ? 'selected' : '' ?>
                                    ><?= $motif['name_type'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-text error" id="showMotifError"><?= $error['motif'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="montant" class="col-sm-2 col-form-label">Montant TTC *</label>
                        <div class="col-sm-10">
                            <input type="number" name="ttc" step="0.01" class="form-control shadow <?= $error['ttc_red'] ?? '' ?>" id="ttc" placeholder="0" value="<?= $_POST['ttc'] ?? ''?>">
                            <div class="form-text error"><?= $error['ttc'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tva" class="col-sm-2 col-form-label">TVA *<span id="showTVA"></span></label>
                        <div class="col-sm-10">
                            <input type="number" name="tva" step="0.01" class="form-control shadow <?= $error['tva_red'] ?? '' ?>" id="tva" value="<?= $_POST['tva'] ?? ''?>">
                            <div class="form-text error"><?= $error['tva'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="ht" class="col-sm-2 col-form-label">Montant HT *</label>
                        <div class="col-sm-10">
                            <input type="number" name="ht" step="0.01" class="form-control shadow <?= $error['ht_red'] ?? '' ?>" id="ht" value="<?= $_POST['ht'] ?? ''?>">
                            <div class="form-text error"><?= $error['ht'] ?? '' ?></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control shadow" name="description" id="description" rows="3"><?= $_POST['description'] ?? ''?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="file" class="col-sm-2 col-form-label">Fichiers de justificatif (JPG, PNG; Max 2MB)</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" class="form-control shadow" id="file">
                            <div class="form-text error"><?= $error['image'] ?? '' ?></div>
                        </div>
                    </div>


                    <div class="text-center mb-2 ">
                        <button type="submit" class="btn btn-warning shadow">S'identifier</button>
                        <a href="../controllers/controller-gerer.php" type="button" class="btn btn-secondary ms-2 shadow">Arrière</a>
                        <div class="form-text error"><?= $error['bdd'] ?? '' ?></div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    </div>
</main>

<?php include "components/footer.php" ?>
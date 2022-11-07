<script defer type="text/javascript" src="./assets/js/Booking/create.js"></script>
<div class="d-flex h-100 text-center text-bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <main class="px-3">
            <img class="img-fluid" src="./assets/img/logo.png" alt="Le Dragon Paresseux" width="200">
            <h1>Le Dragon Paresseux</h1>
            <h3>Réserver une table</h3>
            <p class="lead mt-3">Le Dragon Paresseux est ouvert tous les jours sauf le dimanche de 19h à 21h.</p>
        </main>
    </div>
</div>

<div class="container" style='max-width: 960px;'>

    <main>
        <div class="row g-5 mt-3">
            <div class="col-md-7 col-lg-12">
                <h4 class="mb-3">Vos informations</h4>
                <form id="booking-create-form" class="needs-validation" novalidate>
                    <input type="hidden" name="arrival-datetime">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="first-name" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="first-name" name="first-name" placeholder="John" required>
                            <div class="invalid-feedback">
                                Un prénom valide est demandé.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="last-name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Le Dragon" required>
                            <div class="invalid-feedback">
                                Un nom valide est demandé.
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email-address" class="form-label">Email</label>
                            <input type="email-address" class="form-control" id="email-address" name="email-address" placeholder="johnledragon@ledragonparesseux.fr" required>
                            <div class="invalid-feedback">
                                Une addresse email valide est nécessaire.
                            </div>
                        </div>
                        <select class="form-select form-select-md" id="number-of-guests" name="number-of-guests" aria-label=".form-select-sm example">
                            <option selected>Selectionner le nombre de personnes</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                            ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <select class="form-select form-select-md" id="arrival-time" name="arrival-time" aria-label=".form-select-sm example">
                            <option selected>Selectionner une heure</option>
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                        </select>
                        <input class="form-control" type="date" id="arrival-date" name="arrival-date">
                        <button class="w-100 btn btn-primary btn-lg mb-5 mt-5" type="submit">Réserver ma table</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

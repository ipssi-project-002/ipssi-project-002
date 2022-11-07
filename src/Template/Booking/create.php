<div class="container" style='max-width: 960px;'>

    <main>
        <div class="py-5 text-center">
            <img class="img-fluid" src="./assets/img/logo.png" alt="Le Dragon Paresseux" width="200">
            <h2>Reserver une table</h2>
            <p class="lead">Le Dragon Paresseux est ouvert tous les jours sauf le dimanche de 19h à 21h. Et c'est déjà pas mal.</p>
        </div>

        <div class="row g-5">
            <div class="col-md-7 col-lg-12">
                <h4 class="mb-3">Vos informations</h4>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstName" placeholder="John" value="" required>
                            <div class="invalid-feedback">
                                Un prénom valide est demandé.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Le Dragon" value="" required>
                            <div class="invalid-feedback">
                                Un nom valide est demandé.
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="johnledragon@ledragonparesseux.com">
                            <div class="invalid-feedback">
                                Une addresse email valide est nécessaire.
                            </div>
                        </div>

                        <select class="form-select form-select-md" aria-label=".form-select-sm example">
                            <option selected>Selectionner le nombre de personnes</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>

                        <input class="input-group-text" type="date" id="start" name="trip-start"
                            value="2018-07-22"
                            min="2022-01-01" max="2022-12-31">

                        <button class="w-100 btn btn-primary btn-lg mb-5 mt-5" type="submit">Réserver ma table</button>
                </form>
            </div>
        </div>
    </main>
</div>
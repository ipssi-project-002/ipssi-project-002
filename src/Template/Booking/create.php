<div class="container" style='max-width: 960px;'>

    <main>
        <div class="py-5 text-center">
            <img class="img-fluid" src="./assets/img/logo.png" alt="Le Dragon Paresseux">
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
                            <input type="text" class="form-control" id="lastName" placeholder="Doe" value="" required>
                            <div class="invalid-feedback">
                                Un nom valide est demandé.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Une addresse email valide est nécessaire.
                            </div>
                        </div>

                        <hr class="my-4">

                        <select class="form-select form-select-md" aria-label=".form-select-sm example">
                            <option selected>Selectionner un jour</option>
                            <option value="1">Lundi</option>
                            <option value="2">Mardi</option>
                            <option value="3">Mercredi</option>
                            <option value="3">Jeudi</option>
                            <option value="3">Vendredi</option>
                            <option value="3">Samedi</option>
                        </select>

                        <select class="form-select form-select-md" aria-label=".form-select-sm example">
                            <option selected>Selectionner une heure</option>
                            <option value="1">19h</option>
                            <option value="2">19h30</option>
                            <option value="3">20h</option>
                            <option value="3">20h30</option>
                            <option value="3">21h</option>
                        </select>

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

                        <button class="w-100 btn btn-primary btn-lg mb-5 mt-5" type="submit">Réserver ma table</button>
                </form>
            </div>
        </div>
    </main>
</div>
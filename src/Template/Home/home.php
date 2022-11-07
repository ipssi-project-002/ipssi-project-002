<div class="d-flex h-100 text-center text-bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <main class="px-3">
      <img class="img-fluid" src="./assets/img/logo.png" alt="Le Dragon Paresseux" width="200">
      <h1>Le Dragon Paresseux</h1>
      <p class="lead">Découvrez nos plats élaborés avec le plus grand soin par nos dragons. Sur place ou à emporter, vos plats sont prêts en moins d'1h.</p>
      <p class="lead">
        <a href="#order" class="btn btn-lg btn-secondary fw-bold border-white bg-white m-1">Commander</a>
        <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white m-1">Réserver une table</a>
      </p>
    </main>
  </div>
</div>


  <div class="album py-5 bg-light" id="order">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($available_dishes as $dish) { ?>
        <div class="col">
          <div class="card shadow-sm">
            <?php
            $pictures = $dish->getPictures();
            if (count($pictures) > 0) {
                $picture = $pictures[0];
            } else {
                $picture = \App\Entity\Picture::default();
            }
            ?>
            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?= $picture->getUrl() ?>" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" />
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Photo non disponible</text></svg> -->
            <div class="card-body">
              <p class="card-text"><?= $dish->getName() ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Ajouter au panier</button>
                </div>
                <small class="text-muted"><?= \App\Utils::formatPrice($dish->getPrice()) ?></small>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>

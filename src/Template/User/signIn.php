<div class="d-flex justify-content-center">
<form id="login-form" method="post" action="?page=user&action=loginSubmit">
  <div class="mb-3 mt-5">
    <label for="login" class="form-label">Adresse email ou pseudo</label>
    <input type="text" class="form-control" name="login" id="login" aria-describedby="loginHelp">
   </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
  <div class="text-center">
    <p>Pas de compte? <a href="?page=user&action=signup">S'enregistrer</a></p>
</form>

</div>

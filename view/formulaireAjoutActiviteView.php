<?php $title = "Formulaire d'ajout d'une activité"; ?>

<?php ob_start(); ?>
<div class="container main d-flex flex-column align-items-center">
<h1>Formulaire d'ajout d'une activité</h1>
<hr>
<form action="./?action=addActivites&amp;" method="post" class="d-flex flex-column justify-content-around align-items-stretch col-lg-6">
<input type="number" name="idType" required hidden value="<?php echo($idType); ?>">
<label for="typeNom">Nom de l'activité :</label>
<input type="text" name="nomActivite" required class="form-control m-2 " min="3" placeholder="Saisir le nom de l'activité">
<!-- TODO CSRF -->
<button class="btn btn-primary m-2">Envoyer</button>
</form>
<hr>
<br>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

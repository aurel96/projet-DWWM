<?php $title = "Formulaire de modification d'une activité"; ?>

<?php ob_start(); ?>
<div class="container main d-flex flex-column align-items-center">
<h1>Formulaire de modification d'une activité</h1>
<hr>
<form action="./?action=updateActivites&amp;" method="post" class="d-flex flex-column justify-content-around align-items-stretch col-lg-6">
<input type="number" name="idActivite" required hidden value="<?php echo($idActivite); ?>">
<label for="typeNom">Nom de l'activite :</label>
<?php echo('<input type="text" name="nomActivite" class="form-control m-2 " min="3" placeholder="Saisir le nom" value="'.$uneActivite->getNomActivité().'"">') ?>
<!-- TODO CSRF -->
<button class="btn btn-primary m-2">Envoyer</button>
</form>
<hr>
<br>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

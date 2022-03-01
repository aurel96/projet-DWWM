<?php $title = 'Formulaire Ajout Type'; ?>

<?php ob_start(); ?>
<div class="container main d-flex flex-column align-items-center">
<h1>Formulaire d'ajout d'un type</h1>
<hr>
<form action="./?action=addTypes&amp;" method="post" class="d-flex flex-column justify-content-around align-items-stretch col-lg-6">
<label for="typeNom">Nom du Type :</label>
<input type="text" name="nomType" class="form-control m-2 " min="3" placeholder="Saisir le nom du type">
<!-- TODO CSRF -->
<button class="btn btn-primary m-2">Envoyer</button>
</form>
<hr>
<br>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

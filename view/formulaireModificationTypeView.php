<?php $title = 'Formulaire de modification'; ?>

<?php ob_start(); ?>
<div class="container main d-flex flex-column align-items-center">
<h1>Formulaire de modification d'un type</h1>
<hr>
<form action="./?action=updateTypes&amp;" method="post" class="d-flex flex-column justify-content-around align-items-stretch col-lg-6">
<label for="typeNom">Nom du Type :</label>
<input name="idType" hidden required value=<?php echo($unType->getNumTypeActivité())?>>
<?php 
echo('<input type="text" name="nomType" required class="form-control m-2 " min="3" placeholder="Saisir le nom du type" value="'.$unType->getNomTypeActivité().'"">');
?>

<!-- TODO CSRF -->
<button class="btn btn-primary m-2">Envoyer</button>
</form>
<hr>
<br>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

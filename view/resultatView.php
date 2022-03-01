<?php $title = $operation; ?>

<?php ob_start(); ?>
<div class="container">
<?php 
if($valeur==true)
{
    echo('<div class="border border-success border-3 rounded p-2 m-2 txt-light">');
    echo('<h1>Opération '.$operation.' réussie</h1>');
}
else{
    echo('<div class="bg-danger txt-light">');
    echo('<h1>Échec de l’opération '.$operation.' </h1>');
}
    ?>
    <a href=".?action=Associations">Voir les associations</a>
</div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

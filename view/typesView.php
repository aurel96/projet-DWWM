<?php $title = 'Associations'; ?>

<?php ob_start(); ?>
<div class="container">
<h1>Les associations</h1>
<a href="./?action=FormulaireAjoutType" class='btn btn-success m-1'>Ajouter un type</a> <br/>
<?php 
    foreach($lesTypes as $unType)
    {
        $lienTypemod="./?action=FormulaireModifType&id=".$unType->getNumTypeActivité()."";
        $lienTypedel="./?action=deleteTypes&id=".$unType->getNumTypeActivité()."";
        $lienActivitesAjout="./?action=FormulaireAjoutActivites&idType=".$unType->getNumTypeActivité()."";
        echo ("<div class='my-3 p-2 border border-secondary border-2'>");
        echo("<h3>".$unType->getNomTypeActivité()."</h3><a href=$lienTypemod class='btn btn-success m-1'>Modifier</a> <a href=$lienTypedel class='btn btn-success m-1'>Effacer</a>");
        echo("<a href=$lienActivitesAjout class='btn btn-success m-1'>Ajouter une Activité</a> <br/>");
        echo("<ul>");
        foreach($unType->getActivités() as $uneActivite)
        {
            $lienActivitéMod="./?action=FormulaireModifActivites&id=".$uneActivite->getNumActivité()."";
            $lienActivitéDel="./?action=deleteActivites&id=".$uneActivite->getNumActivité()."";
            echo ("<li>".$uneActivite->getNomActivité()."</li> <a href=$lienActivitéMod class='btn btn-success m-1'>Modifier</a> <a href=$lienActivitéDel class='btn btn-success m-1'>Effacer</a><br/>");
        }
        echo("</ul>");
        echo ("</div>");
    }
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<?php


//TODO Verification du role de l'utilisateur
function formulaireAjoutType(){
    require("view/formulaireAjoutTypeView.php");
}
function fomulaireMofifType($id)
{
    $uneBDD=new BDD();
    $unType=$uneBDD->getTypesBy("NumTypeActivité",$id)[0];
    require("view/formulaireModificationTypeView.php");
}
function addTypes($nom)
{
    $uneBDD= new BDD();
    $resultat =$uneBDD->addTypes($nom);
    header("Location:./?action=resultat&operation=Ajout%20du%20type&valeur=$resultat");
}
function updateTypes($id,$nom)
{
    $uneBDD= new BDD();
    $resultat =$uneBDD->updateTypes($id,$nom);
    header("Location:./?action=resultat&operation=Modification%20du%20type&valeur=$resultat");
}
function deleteTypes($id)
{
    $uneBDD= new BDD();
    $resultat =$uneBDD->deleteTypes($id);
    header("Location:./?action=resultat&operation=Suppresion%20du%20type&valeur=$resultat");
}
function  formulaireAjoutActivite($idType){
    require("view/formulaireAjoutActiviteView.php");
}
function formulaireModificationActivite($idActivite)
{
    $uneBDD= new BDD();
    $uneActivite=$uneBDD->getActiviteBy("NumActivité",$idActivite)[0];
    require("view/formulaireModificationActiviteView.php");
}
function addActivites($nomActivite,$idType){
    $uneBDD= new BDD();
    $resultat=$uneBDD->addActivites($nomActivite,$idType);
    header("Location:./?action=resultat&operation=Ajout%20d'une%20activite&valeur=$resultat");
}
function updateActivites($id,$nom)
{
    $uneBDD= new BDD();
    $resultat =$uneBDD->updateActivites($id,$nom);
    header("Location:./?action=resultat&operation=Modification%20Activite&valeur=$resultat");
}
function deleteActivites($id)
{
    $uneBDD= new BDD();
    $resultat =$uneBDD->deleteActivites($id);
    header("Location:./?action=resultat&operation=Suppresion%20activite&valeur=$resultat");
}
function  resultatOperation($operation,$valeur)
{
    require("view/resultatView.php");
}

?>

<?php
class Association {
    private $NumAssociation;
    private $NomAssociation;
    private $AdresseElectroniqueAssociation;
    private $AssociationPrivée;
    private $NumActivité;
    private $SiteAssociation;
    private $Associations;

    
    function __construct($unNomAssociation)
    {
       
    }

function getNumAssociation(){
    return $this->NumAssociation;
}
function getNomAssociation(){
    return $this->NomAssociation;
}
function getAdresseElectroniqueAssociation(){
    return $this->AdresseElectroniqueAssociation;
}
function getAssociationPrivée(){
    return $this->AssociationPrivée;
}
function getNumActivité(){
    return $this->NumActivité;
}
function getSiteAssociation(){
    return $this->SiteAssociation;
}
function getAssociations(){
    return $this->Associations;
}

function setNumAssociation($unId){
    $this->NumTypeActivité=$unId;
}
function setNomAssociation($unNom){
    $this->NumTypeActivité=$unNom;
}
function setAdresseElectroniqueAssociation($uneAdresseElec){
    $this->NumTypeActivité=$uneAdresseElec;
}
function setAssociationPrivée($privée){
    $this->NumTypeActivité=$privée;
}
function setNumActivité($lesNumActivités){
    $this->NumTypeActivité=$lesNumActivités;
}
function setSiteAssociation($unSite){
    $this->NumTypeActivité=$unSite;
}
function setAssociations($desAsso){
    $this->NumTypeActivité=$desAsso;
}



}
?>
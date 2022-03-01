<?php
class Activite {
    private $NumActivité;
    private $NomActivité;
    private $Associations;
    
    public function __construct()
    {

    }

    function getNumActivité()
    {
        return $this->NumActivité;
    }
    function getNomActivité()
    {
        return $this->NomActivité;
    }
    function getAssociations()
    {
        return $this->Associations;
    }

    function setNumActivité ($unId)
    {
        $this->NumActivité=$unId;
    }
    function setNomActivité ($unNom)
    {
        $this->NomActivité=$unNom;
    }
    function setAssociations ($desAsso)
    {
        $this->Associations=$desAsso;
    }
}
?>

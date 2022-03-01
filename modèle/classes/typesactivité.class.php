
<?php
class typesactivité {
    private $NumTypeActivité;
    private $NomTypeActivité; 
    private $Activités;
    public function __construct()
    {
    }
    function getNumTypeActivité()
    {
        return $this->NumTypeActivité;
    }
    function getNomTypeActivité()
    {
        return $this->NomTypeActivité;
    }
    function getActivités ()
    {
        return $this->Activités;
    }
    function setNumTypeActivité ($unId)
    {
        $this->NumTypeActivité=$unId;
    }
    function setNomTypeActivité ($unNom)
    {
        $this->NomTypeActivité=$unNom;
    }
    function setActivités ($desActivités)
    {
        $this->Activités=$desActivités;
    }
}
?>
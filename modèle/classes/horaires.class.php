<?php
class Horaire {
    private $NumHoraire;
    private $JoursSemaine;
    private $HeureDébut;
    private $heureFin;

    private $Horaires=array();

    function __construct($unNumHoraire)
    {
        $this->NumHoraire=$unNumHoraire;
    }

}
?>
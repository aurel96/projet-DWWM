<?php
class Contact {
    public $NumContact;
    public $CivilitéContact;
    public $NomContact;
    public $TelephoneContact;
    public $AdresseElectroniqueContact;
    public $Contacts=array();

    function __construct($unNomContact)
    {
        $this->NomContact=$unNomContact;
    }

}
?>
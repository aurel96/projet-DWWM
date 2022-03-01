<?php

require("classes/typesactivité.class.php");
require("classes/associations.class.php");
require("classes/contact.class.php");
require("classes/horaires.class.php");
require("classes/activite.class.php");
class BDD {
    
     public $conn;

    // Constructeur //
    public function  __construct()
    {
        $this->conn= new PDO("mysql:host=localhost;dbname=forum_asso2", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    //  fin Constructeur //

     // Activité //
    
    function getAllTypes()
    {
        try{
        $stmt = $this->conn->prepare(" Select * from typeactivité");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Type'); //?
        $stmt->execute();
        $lesTypes=array();
     
        $resultat = ($stmt->fetchAll());
        
        // foreach($resultat as $unType )
        // {
        //     $lesActivites=$this->getActiviteBy("NumTypeActivité",$unType->getNumTypeActivité());
        //     $unType->setActivités($lesActivites);
            
        //     array_push($lesTypes,$unType);      
        // }
   
       
        return $resultat;
    }
        catch(PDOException $error)
        {
            echo $error->getMessage();
        }

    }

    function getTypesBy($nomCol,$valeurCol)
    {
        try{
            $stmt= $this->conn->prepare("SELECT * FROM typeactivité WHERE $nomCol = :valeurCol");
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Type');
            $stmt->bindParam(":valeurCol",$valeurCol);
            $stmt->execute();
            
            $lesTypes=array();
            $resultat=($stmt->fetchAll());
            
            foreach($resultat as $unType)
            {
                $lesActivites=$this->getActiviteBy("NumTypeActivité",$unType->getNumTypeActivité());
                $unType->setActivités($lesActivites);
                array_push($lesTypes,$unType); // Ajouter un type a la liste de types
            }
            return $lesTypes;
           
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    function addTypes($nomType)
    {
        try{
            $stmt= $this->conn->prepare("INSERT INTO typeactivité values(null,:NomTypeActivité)");
            $stmt->bindParam(":NomTypeActivité",$nomType);
            $stmt->execute();
            //Verification de l'ajout
            $newId=$this->conn->lastInsertId(); // Permet de recuperer l'id du dernier ajout
            $verifType=$this->getTypesBy("NumTypeActivité",$newId)[0]; // Extraction du dernier ajout
            if($verifType->getNomTypeActivité()==$nomType) // Verification que le nom du dernier ajout==$nomType
            {
                return true; //Ajout OK
            }
            else {
                return false; //Ajout a échoué
            }
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    function updateTypes($idType,$nomType)
    {
        {
            try{
                $stmt= $this->conn->prepare("UPDATE typeActivité SET NomTypeActivité = :nomType where NumTypeActivité=:uneId");
                $stmt->bindParam(":nomType",$nomType);
                $stmt->bindParam(":uneId",$idType);
                $stmt->execute();
                //Verification
                $verifType=$this->getTypesBy("NumTypeActivité",$idType)[0]; // Extraction du Type
                if($verifType->getNomTypeActivité()==$nomType) // Verification que le nom du dernier ajout==$nomType
                {
                    return true; //Modification OK
                }
                else {
                    return false; //Modification a échoué
                }
            }
            catch(PDOException $error)
            {
                echo $error->getMessage();
            }
        }
    }

    function deleteTypes($idType)
    {
        try{
            $leType=$this->getTypesBy("NumTypeActivité",$idType)[0];
            foreach($leType->getActivités() as $activité)
            {
                var_dump($this->deleteActivites($activité->getNumActivité()));
            }
            $sql2= $this->conn->prepare("DELETE FROM typeActivité where NumTypeActivité=:uneId");
            $sql2->bindParam(":uneId",$idType);
            var_dump($sql2);
            $sql2->execute();
            //Verification
            $verifType=$this->getTypesBy("NumTypeActivité",$idType); // Extraction du Type
            if(count($verifType)==0) // Verification 
            {
                return true; //Modification OK
            }
            else {
                return false; //Modification a échoué
            }
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();
        }
    }




    function getActiviteBy($nomCol,$valeurCol)
    {
        try{
        $stmt = $this->conn->prepare(" Select * from activités where ".$nomCol."=:valeurCol");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Activite');
        $stmt->bindParam(':valeurCol', $valeurCol);
        $stmt->execute(); 
        $lesActivité=array();
        $resultat = ($stmt->fetchAll());
        // var_dump($resultat);
       
    

    foreach($resultat as $uneActivite)
    {
$lesAsso=$this->getAssociationBy("NumActivité",$uneActivite->getNumActivité());
$uneActivite->setAssociations($lesAsso);
array_push($lesActivité,$uneActivite);
    }
    return $lesActivité;
}
       catch(PDOException $error)
       {
           echo $error->getMessage();
       }

        
    }

    function addActivites($nom,$idType)
    {
        try{
            $stmt= $this->conn->prepare("INSERT INTO activités values(null,:nom,:idType)");
            $stmt->bindParam(":nom",$nom);
            $stmt->bindParam(":idType",$idType);
            $stmt->execute();
            //Verification de l'ajout
            $newId=$this->conn->lastInsertId(); // Permet de recuperer l'id du dernier ajout
            $verif=$this->getActivitesBy("NumActivité",$newId)[0]; // Extraction du dernier ajout
            if($verif->getNomActivité()==$nom) // Verification que le nom du dernier ajout==$nomType
            {
                return true; //Ajout OK
            }
            else {
                return false; //Ajout a échoué
            }
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();
        }
    }

    function updateActivites($id,$nom)
    {
        {
            try{
                $stmt= $this->conn->prepare("UPDATE activités SET NomActivité = :nom where NumActivité=:uneId");
                $stmt->bindParam(":nom",$nom);
                $stmt->bindParam(":uneId",$id);
                $stmt->execute();
                //Verification de la modif
                $verif=$this->getActivitesBy("NumActivité",$id)[0]; // Extraction de l'activite
                if($verif->getNomActivité()==$nom) // Verification que le nom du dernier ajout==$nom
                {
                    return true; //Modification OK
                }
                else {
                    return false; //Modification a échoué
                }
            }
            catch(PDOException $error)
            {
                echo $error->getMessage();
            }
        }
    }

    function deleteActivites($id)
    {
        try{
            $sql1= $this->conn->prepare("DELETE FROM proposer where NumActivité=:uneId");
            $sql1->bindParam(":uneId",$id);
            $sql1->execute();
            
            $sql2= $this->conn->prepare("DELETE FROM activités where NumActivité=:uneId");
            $sql2->bindParam(":uneId",$id);
            $sql2->execute();
            
            //Verification de l'ajout
            $verif=$this->getActivitesBy("NumActivité",$id); // Extraction du Type
            if(count($verif)==0) // Verification 
            {
                return true; //Modification OK
            }
            else {
                return false; //Modification a échoué
            }
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();

        }
    }
   


//Fin Activité //

//Associations //
    function getAssociation()
    {
        $stmt = $this->conn->prepare(" Select * from associations");
        $stmt->execute();
        $resultat = ($stmt->fetchAll());
        // var_dump($resultat);
        return $resultat;
    }



    function getAssociationBy($nomCol,$valeurCol)
    {
        try{
        $stmt = $this->conn->prepare(" Select * from associations natural join proposer where $nomCol=:valeurCol");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Association');
        $stmt->bindParam(':valeurCol', $valeurCol);
        $stmt->execute(); 
        $resultat = ($stmt->fetchAll());
    //  var_dump($resultat);
       return $resultat;  
        }
        catch(PDOException $error)
        {
            echo $error->getMessage();
        }

    }

//Fin Associations //

// // Contact//

// function getContact()
// {
//     $stmt = $this->conn->prepare(" Select * from contact");
//     $stmt->execute();
//     $resultat = ($stmt->fetchAll());
//     // var_dump($resultat);
//     return $resultat;
// }

// function getContact2()
// {
   
//     $stmt = $this->conn->prepare(" Select * from contact");
//     $stmt->execute(); 
//     $resultat = ($stmt->fetchAll());
//     $lesContacts=array();
//     foreach($resultat as $unContact )
//     {
//         $ta=new Contact($unContact['2']);
//         $ta->NumContact=$unContact['0'];
//         array_push($lesContacts,$ta);
//         $lesContacts1=$this->getContactby("NumContact",$unContact[0]);
//     }
//     // var_dump($lesContacts);
//     return $resultat;
// }

// function getContactBy($nomCol,$valeurCol)
// {
  
//     $stmt = $this->conn->prepare(" Select * from contact where ".$nomCol."=:valeurCol");
//     $stmt->bindParam(':valeurCol', $valeurCol);
//     $stmt->execute(); 
//     $resultat = ($stmt->fetchAll());
// //  var_dump($resultat);
//    return $resultat;  
// }



// // Fin Contact //

// //Horaires//

// function getHoraire()
// {
//     $stmt = $this->conn->prepare(" Select * from horaires");
//     $stmt->execute();
//     $resultat = ($stmt->fetchAll());
//     // var_dump($resultat);
//     return $resultat;
// }

// function getHoraire2()
// {
   
//     $stmt = $this->conn->prepare(" Select * from horaires");
//     $stmt->execute(); 
//     $resultat = ($stmt->fetchAll());
//     $lesHoraires=array();
//     foreach($resultat as $unHoraire )
//     {
//         $ta=new Horaire($unHoraire['1']);
//         $ta->NumHoraire=$unHoraire['0'];
//         array_push($lesHoraires,$ta);
//         $lesHoraires2=$this->getHoraireby("NumHoraire",$unHoraire[0]);
//     }
//     // var_dump($lesHoraires);
//     return $resultat;
// }

// function getHoraireBy($nomCol,$valeurCol)
// {
  
//     $stmt = $this->conn->prepare(" Select * from horaires where ".$nomCol."=:valeurCol");
//     $stmt->bindParam(':valeurCol', $valeurCol);
//     $stmt->execute(); 
//     $resultat = ($stmt->fetchAll());
// //  var_dump($resultat);
//    return $resultat;  
// }

// //fin Horaires//
 }




// $uneBDD=new BDD();
// $lesTypes=$uneBDD->getAllTypes();
// $lesActivites=$uneBDD->getActiviteBy("NumTypeActivité",1);
// var_dump($lesActivites);
// var_dump($uneBDD->addTypes("TestType"));
// $lesAsso=$uneBDD->getAssociationBy("NumActivité",1);
// var_dump($lesAsso);
<?php


require('modèle\BDD.php');
function page1()
{
    require('view/indexView.php');
}

function VoirAssociations()
{
    $BDD=new BDD();
  $lesTypes=$BDD->getAllTypes();
 
 require('view/typesView.php');
}
 function page3()
 {
     require('view/page3View.php');
 }
?>
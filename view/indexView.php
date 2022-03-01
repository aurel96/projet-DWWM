<?php $title = 'Home'; ?>

<?php ob_start(); ?>

<div style="background-color:#FFD200">

<div class="container" >



<div class="row align-items-center" style="padding-top:10px; ">


<img src="public/img/tennis2.jpg" class="img-fluid col-3" alt="">


<img src="public/img/carte.jpg" class="img-fluid col-3" alt="">


<img src="public/img/ballon2.jpg" class="img-fluid col-3" alt="">


<img src="public/img/guitare.jpg" class="img-fluid col-3" alt="">

</div>  

    <h1 class="titre">Temps Libre</h1>

<div class="row align-items-center"style="padding-bottom:10px;">


<img src="public/img/dé.jpg" class="img-fluid col-3 shadow"  alt="">


<img src="public/img/peinture.jpg" class="img-fluid col-3" alt="">


<img src="public/img/velo.jpg" class="img-fluid col-3" alt="">


<img src="public/img/danse.jpg" class="img-fluid col-3" alt="">

</div>  

   
</div>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>

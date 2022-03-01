<?php $title = 'Association'; ?>

<?php ob_start(); ?>
<div class="container">
<h1>Association</h1>
<p>page2View.php donne le content et title a template.php</p>
<ol>
    <li>index.php</li>
    <li>controller.php</li>
    <li>indexView.php ou page2View.php</li>
    <li>template.php </li>
</ol>
<a href="./">lien page 1 </a>
<br>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>

<h3>Erreur : </h3>

<meta http-equiv="refresh" content="3; URL=/" />

<div class="alert alert-danger">

    <p style="color:red">

        <?=  $errorMessage; ?>
            
    </p>

</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>

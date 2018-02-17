<?php $title = 'Success'; ?>

<?php ob_start(); ?>

<h3>Message : </h3>

<meta http-equiv="refresh" content="2; URL=/posts" />

<div class="alert alert-success">

    <p style="color:green">

        <?=  $errorMessage ?>
        	
    </p>

</div>

<?php $content = ob_get_clean() ; ?>

<?php require('template.php'); ?>
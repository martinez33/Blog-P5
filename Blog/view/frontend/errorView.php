<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>

<h3>Erreur : </h3>
<p><?= $errorMessage ?></p>
	

<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

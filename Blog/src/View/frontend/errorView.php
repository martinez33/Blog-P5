<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>


<h3>Erreur : </h3>
<div class="alert alert-danger">
	<p><?= /*$errorMessage*/  'erreur' ?></p>
</div>

<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

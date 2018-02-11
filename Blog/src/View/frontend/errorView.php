<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>

<h3>Erreur : </h3>

<!--link href="src/public/startbootstrap-clean-blog/css/bootstrap.css" rel="stylesheet"-->
<link href="src/public/startbootstrap-clean-blog/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="refresh" content="3; URL=/" />

                  <div class="alert alert-danger">
                    <p style="color:red"><?=  $errorMessage ?></p>
                  </div>

<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

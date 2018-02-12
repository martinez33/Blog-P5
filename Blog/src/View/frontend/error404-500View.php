<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>

<h3>Erreur 404 : </h3>


<meta http-equiv="refresh" content="5; URL=/Blog-p5/blog/" />

                  <div class="alert alert-danger">
                    <p style="color:red"><?=  $errorMessage ?></p>
                  </div>

<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

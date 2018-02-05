<?php $title = 'Succes : '; ?>
<?php ob_start(); ?>

<h3>Message : </h3>

<!--link href="src/public/startbootstrap-clean-blog/css/bootstrap.css" rel="stylesheet"-->
<link href="src/public/startbootstrap-clean-blog/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="refresh" content="10; URL=/Blog-p5/blog/" />

                  <div class="alert alert-success">
                    <p style="color:green"><?=  $errorMessage ?></p>
                  </div>

<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>
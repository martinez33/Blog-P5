<?php $title = 'Erreur'; ?>
<?php ob_start(); ?>

<h3><?=  $errorMessage ?></h3>

<link href="src/public/startbootstrap-clean-blog/css/bootstrap.css" rel="stylesheet">
<meta http-equiv="refresh" content="30; URL=index.php?action=home" />

<div class="modal fade" id="crea-popup" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true" >
        <div class="modal-dialog">  
          <div class="modal-content">
          	<div class="modal-header">
          		<h4 class="modal-title">Message :</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                    <p><?=  $errorMessage ?></p>
            </div>
            <div class="modal-footer" >
            <button class="btn btn-info" data-dismiss="modal"  >Fermer</button>
                  </div> 
          	<!--<p><?=  $errorMessage ?></p>-->
          </div>  
        </div> 
      </div>
     
    <script src="src/public/startbootstrap-clean-blog/js/jquery-3.2.1.js"></script>
    <script src="src/public/startbootstrap-clean-blog/js/bootstrap.min.js"></script>
    <script> 
      $("#crea-popup").modal("show");
     
    
    </script>



<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

<?php $title='Le blog'; ?>
    
<?php ob_start() ?>	

<div class="row">
		
		<div class="col-lg-8 col-md-10 mx-auto">

			<h2 >Tous les posts : </h2><br />
											
			<?php
			foreach ($posts as $post) :
			{
			?>

				<div class="posts">
					<h3>
						<?= $post->getTitle() ?>
					</h3>
					<p><em>    le <?= $post->getCreationDate() ?></em></p>
										                
					<p>
						<?= nl2br($post->getChapo()) ?><br />
						<?= nl2br($post->getContent()) ?>
						<br />
						<?= nl2br($post->getAuthor()) ?>
						<em><a href="index.php?action=post&id=<?=$post->getId()?>"><br />Consulter</a></em>
						<hr />
					</p>
				</div>
			<?php
			}
			endforeach;
			?>
		</div>
		
			<div class="col-lg-4 col-md-2 mx-auto">
				<form  class="well" action="index.php?action=addPost" method="POST" >
					<div class="form-group">
						<legend>Création d'un Post</legend>
					</div>
					<div >
						<label for="title" class="control-label">Titre :</label>
						<br />
						<input type="text" id="title" name="title" />
						<br />
					
						<label for="chapo" class="control-label">Chapo :</label>
						<br />
						<input type="text" id="chapo" name="chapo" />
						<br />

						<label for="content" class="control-label">Post :</label>
						<br />
						<textarea class="form-control" rows="5" id="content" name="content" ></textarea>
						
					
						<label for="author" class="control-label">Auteur :</label><br />
						<input type="text" id="author" name="author" /><br />
					

						<br />
						<button type="submit" name="" data-toggle="modal" data-target="#crea-popup"  >Envoyer</button> 
					</div>
				</form>
			</div>
		
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    	

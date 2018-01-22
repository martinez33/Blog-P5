
<?php ob_start(); ?>




		<div class="row">
			<div class="col-lg-8">
				<?php
				foreach ($post as $post) :
				{
				?>
				<?php $title=$post->getTitle(); ?>

					<div class="news">
						<h3>
							<?= $post->getTitle() ?>
						</h3>
						<p><em>    le <?= $post->getCreationDate() ?></em></p>
											                
						<p>
							<?= nl2br($post->getChapo()) ?><br />
							<?= nl2br($post->getContent()) ?>
							<br />
							<?= nl2br($post->getAuthor()) ?>
							<br />
							<em><a href="index.php?url=deletePost&id=<?= $post->getId(); ?>">Supprimer</a></em>
						</p>
					</div>
				<?php
				}
				endforeach;
				?>
			</div>

			<div class="col-lg-4">
					<form  class="well" action="/Blog-p5/blog/post/modify/<?= $post->getId(); ?>" method="POST" > <!--index.php?url=modifPost&id=-->
						<div class="form-group">
							<legend>Modifiez le Post : <br />
								<p><?= $post->getTitle() ?></p></legend>
						</div>
						
							<label for="title" class="control-label">Titre :</label><br />
							<input type="text" id="title" name="title" /><br />
				
				
							<label for="chapo" class="control-label">Chapo :</label><br />
							<input type="text" id="chapo" name="chapo" /><br />
						
						
							<label for="content" class="control-label">Post :</label><br />
							<textarea class="form-control" rows="5" id="content" name="content" ></textarea><br />
							
						
						
							<label for="author" class="control-label">Auteur :</label><br />
							<input type="text" id="author" name="author" /><br />
						
						<br />
							<button type="submit" name="" >Envoyer</button>
					</form>
				</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

  
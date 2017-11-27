<?php $title='Mon blog'; ?>
    
<?php ob_start() ?>	


<h1>Mon blog</h1>
<br />
	<div class="col-lg-6">
		<h2>Ajoutez un post : </h2>
	
		<form  class="well" action="index.php?action=addPost" method="POST" >
			<div class="form-group">
				<legend>Création Post</legend>
			</div>
			<div class="row">
				<label for="title" class="control-label">Titre</label><br />
				<input type="text" id="title" name="title" />
			</div>
			<div class="row">
				<label for="chapo" class="control-label">Chapo</label><br />
				<input type="text" id="chapo" name="chapo" />
			</div>
			<div class="row">
				<label for="content" class="control-label">Post</label><br />
				<textarea class="form-control" rows="5" id="content" name="content" ></textarea> 
				
			</div>
			<div class="row">
				<label for="author" class="control-label">Auteur</label><br />
				<input type="text" id="author" name="author" />
			</div>
			<br />
			<div class="row">

				<input type="submit" name="Envoyer" />
			</div>
		</form>
	</div>

	<div class="col-lg-6">

		<h2>Les derniers posts : </h2><br />
									
		<?php
		while($data = $posts->fetch())
		{
		?>

			<div class="news">
				<h3>
					<?= htmlspecialchars($data['title']) ?>
				</h3>
				<p><em>    le <?= $data['creationDateFr'] ?></em></p>
								                
				<p>
					<?= nl2br(htmlspecialchars($data['chapo'])) ?><br />
					<?= nl2br(htmlspecialchars($data['content'])) ?>
					<br />
					<?= nl2br(htmlspecialchars($data['author'])) ?>
					<em><a href="index.php?action=post&amp;id=<?=$data['id'] ?>">Consulter</a></em>
				</p>
			</div>
		<?php
		}
	$posts->closeCursor();
	?>
	</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    	

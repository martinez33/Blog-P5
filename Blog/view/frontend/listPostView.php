<?php $title='Mon blog'; ?>
    
<?php ob_start() ?>	

<h2>Mon blog</h2>
<br />
<h2>Ajoutez un post : </h2>

<div class="container">

	<div class="col-lg-6">
		<form action="index.php?action=addPost" method="POST" >
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

		<p>Les derniers posts : </p><br />
									
		<?php
		while($data = $posts->fetch())
		{
		?>

			<div class="news">
				<h3>
					<?= htmlspecialchars($data['title']) ?>
					<em>    le <?= $data['creationDateFr'] ?></em>
				</h3>
								                
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
    	

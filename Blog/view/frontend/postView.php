<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des posts</a></p>

<h2>Modifiez le post : </h2>
	<div class="col-lg-6">
		<form  class="well" action="index.php?action=modifyPost&amp;id=<?= $post['id'] ?>" method="POST" >
			<div class="form-group">
				<legend>Modification Post</legend>
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

		<div class="news">
			<h3>
			    <?= htmlspecialchars($post['title']) ?>
			    <em> Créé le <?= $post['creationDateFr'] ?></em>
			    <em> Modifier le <?= $post['modificationDateFr'] ?></em>
			</h3>
			            
			<p>
				<?= nl2br(htmlspecialchars($post['chapo'])) ?>
			    <?= nl2br(htmlspecialchars($post['content'])) ?>
			    <?= nl2br(htmlspecialchars($post['author'])) ?>
			    <a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>">Supprimer</a>
			</p>
		</div>
	</div>


<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

  
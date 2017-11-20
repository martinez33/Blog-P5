<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
	<h3>
	    <?= htmlspecialchars($post['title']) ?>
	    <em>le <?= $post['creation_date_fr'] ?></em>
	</h3>
	            
	<p>
	    <?= nl2br(htmlspecialchars($post['content'])) ?>
	</p>
</div>

<h2>Ajoutez des commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >
	<div>
		<label for="author">Auteur</label><br />
		<input type="text" id="author" name="author" />
	</div>
	<div>
		<label for="comment">Commentaire</label><br />
		<input type="text" id="comment" name="comment" />
	</div>
	<br />
	<div>

		<input type="submit" name="Envoyer" />
	</div>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
 	<p>
 		<strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['comment_date_fr'] ?>
 		<em><a href="index.php?action=comment&amp;id=<?= $post['id'] ?>&amp;idCom=<?= $comment['id'] ?>">(Modifier)</a></em>
	</p>
	<p>
		<?= nl2br(htmlspecialchars($comment['commentaire'])) ?>
		
	</p><br />

<?php
}
?>
<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

  
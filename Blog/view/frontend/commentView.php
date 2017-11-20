<?php $title = 'Modification'; ?>
<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php?action=post&amp;id=<?= $post['id'] ?>">Retour au billet</a></p>

<div class="news">
	<h2>Le commentaire</h2>

	<p>
		<strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['comment_date_fr'] ?>
		<br />
	    <?= nl2br(htmlspecialchars($comment['commentaire'])) ?>      
	</p>  	
</div>

	<h3>Modifiez le commentaire : </h3>


<form action="index.php?action=modifyComment&amp;idCom=<?=$comment['id'] ?>&amp;id=<?= $post['id'] ?>" method="post" >
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

		<input type="submit" name="Modifer" />
	</div>
</form>


<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>
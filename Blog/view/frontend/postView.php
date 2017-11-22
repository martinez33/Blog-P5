<?php $title = htmlspecialchars($post['title']); ?>
<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des posts</a></p>

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
	</p>
</div>


<?php $content = ob_get_clean() ; ?>
<?php require('template.php'); ?>

  
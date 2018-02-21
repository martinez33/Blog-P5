<?php $title = 'Le blog'; ?>
   
<?php ob_start(); ?> 

<div class="row">
        
    <div class="col-lg-8 col-md-10 mx-auto">

        <h2 style="border-bottom: 1px solid black;
         border-top: 1px solid black;
         text-align: center">Tous les posts : </h2><br />
                                            
        <?php

        foreach ($posts as $post) :
        ?>

            <div class="posts" style="background-color: #d3d3d3;
             padding: 10px;
             margin: 5px;">

                <h3 style="text-align: center;">

                        <?= $post->getTitle(); ?>

                </h3>

                <?php

                if (!empty($post->getModificationDate())) {
                    ?>

                    <p class="blog-post-meta" style="text-align: right;">
                        Modifié le : <?= $post->getModificationDate(); ?>        
                    </p>

                <?php
                } else {
                    ?>

                    <p class="blog-post-meta" style="text-align: right;">
                        Création le : <?= $post->getCreationDate(); ?>       
                    </p>

                <?php
                }

                ?>
                                                        
                <p>

                    <?= nl2br($post->getChapo()); ?><br />
                        
                    <a href="/posts/<?=$post->getId(); ?>">Voir la suite</a><hr />

                </p>

            </div>

        <?php
        endforeach;

        ?>

    </div>
        
    <div class="col-lg-4 col-md-2 mx-auto" >

        <div style="border: 1px solid black;
         background-color: #778899;
         border-radius: 10px;
         padding: 10px;
         margin-top: 83px;">

            <h2 >Création d'un post</h2>

            <br>

            <form method="post" action="/post/add" name="" id="contactForm" novalidate >

                <div class="control-group">

                    <div class="form-group "> 

                        <label for="title">Titre :</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Titre"/>
                        <p class="help-block text-danger"></p>

                    </div>

                </div>

                <div class="control-group">

                    <div class="form-group ">

                        <label>Chapo :</label>
                        <input type="text" name="chapo" class="form-control" placeholder="Sous-titre" id="chapo" >
                        <p class="help-block text-danger"></p>

                    </div>

                </div>

                <div class="control-group">

                    <div class="form-group ">

                        <label>Contenu du post :</label>
                        <textarea name="content" rows="5" 
                         class="form-control" 
                         placeholder="Contenu du post" id="content" >
                        </textarea>
                        <p class="help-block text-danger"></p>

                    </div>

                </div>

                <div class="control-group">

                    <div class="form-group ">

                        <label>Auteur :</label>
                        <input type="text" name="author" class="form-control" placeholder="Auteur" id="author" >
                        <p class="help-block text-danger"></p>

                    </div>

                </div>

                <div id="success"></div>

                <div class="form-group">

                    <button type="submit" class="btn" id="sendMessageButton">Créer</button>

                </div>

            </form>

        </div>

    </div>
        
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
        

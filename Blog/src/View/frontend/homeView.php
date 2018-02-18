<?php $title='Mon blog'; ?>
   
<?php ob_start() ?>	

<div class="container">

    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">

            <div class="row" >

                <div class="col-lg-7 col-md-12 mx-auto" >

                    <a href="#" class="thumbnail">

                        <img src="images/photoMartin.jpg" alt="Moi" class="img-rounded" style="margin : 25px 5px 25px 5px;">

                    </a>

                </div>

                <div class="col-lg-5 col-md-12 mx-auto" >

                    <p style="margin : 25px 10px 40px -25px; padding: 10px 5px 5px 10px ; background-image: url('images/fond.png');">Ce blog (Projet de parcours) met en avant les différentes connaissances acquises depuis le début de ma formation , en vue d'une prise de contact avec un employeur. <br>Ce blog représente donc le resultat final de ce projet .</p>

                </div>

            </div>

            <div class="blog-post" >

                <?php

                foreach ($posts as $post) : {

                ?>

                <div style="background-color: #d3d3d3; padding: 10px; margin: 5px 5px 20px 5px;">

                    <h2 class="blog-post-title post-title" style="text-align: center;">

                      <?= $post->getTitle() ?>
                        
                    </h2>

                      
                    <h4>

                        <?= $post->getChapo(); ?>
                    
                    </h4>

                    <p>

                        <?= $post->getExtContent(); ?>

                        <a href="/posts/<?=$post->getId()?>">Voir la suite</a> 

                    </p>
                      
                    <hr/>

                </div>

                <?php

                } endforeach;

                ?>

            </div>

		    </div>


		    <div class="col-lg-4 col-md-2col-sm-3 blog-sidebar">

          	<div class="sidebar-module sidebar-module-inset">

                <h4>À propos de moi</h4>
            	  <p>Bienvenue sur mon blog. Je m'appel Martin Forestier et je suis étudiant chez <a href="https://openclassrooms.com/">OpenClassRooms</a>. Je suis le parcours : <em>Développeur d'application PHP/Symfony</em>.</p>

          	</div>
          	
          	<div class="sidebar-module">

            	<h4>Sur les réseaux sociaux</h4>

            	<ol class="list-unstyled">

              		<li><a href="https://github.com/martinez33/Blog-P5">GitHub</a></li>
              		<li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
              		<li><a href="https://www.linkedin.com/in/martin-forestier-136173140/">LinkedIn</a></li>

            	</ol>

         	</div>

            <div class="sidebar-module">

                <a href="Forestier_martin.pdf"><img src="images/logoCv.png" alt="" style="margin-left: -40px" /></a>

            </div>

        </div>
               
    </div>

    <div class="row">
        <!-- Main Content -->
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto" >

                    <div style="border: 1px solid #343a40; background-color: #343a40; border-radius: 10px; padding: 5px;">

                        <h2 style="color: #868e96;">Contactez-moi !</h2>
            
                        <form method="post" action="/sendMail" name="" id="contactForm" novalidate>

                            <div class="control-group">

                                <div class="form-group floating-label-form-group controls">

                                    <label for="name">Nom</label>
                                    <input type="text" id="name" name="lastName" class="form-control" placeholder="Nom" required data-validation-required-message="Please enter your name."/><!--input type="text" name="name"  id="name" -->
                                    <p class="help-block text-danger"></p>

                                </div>

                            </div>

                            <div class="control-group">

                                <div class="form-group floating-label-form-group controls">

                                    <label for="name">Prénom</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Prénom" required data-validation-required-message="Please enter your name."/><!--input type="text" name="name"  id="name" -->
                                        <p class="help-block text-danger"></p>
                                </div>

                            </div>

                            <div class="control-group">

                                <div class="form-group floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Adresse email" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>

                                </div>

                            </div>

                            <div class="control-group">

                                <div class="form-group floating-label-form-group controls">

                                    <label>Message</label>
                                    <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>

                                </div>

                            </div>

                            <br>

                            <div id="success"></div>

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>

                            </div>

                        </form>

                    </div>

                </div>
      
                <section class="col-lg-4 col-md-10 mx-auto" id="">

            	      <p >Ce blog vous propose de consulter, créer et modifier un ou plusieurs posts, de preférence en rapport avec le développement.<br>
                    En tant qu'administrateur, je me réserve le droit de supprimer tous posts tendancieux et/ou hors de propos.<br>
                    Vous pouvez si vous le souhaitez, me consulter via le formulaire de contact, afin d'obtenir de plus amples informations sur moi.<br>
                    Je développe actuellement le projet suivant qui intègrera plus de fonctionnalités comme "l'authentification des utilisateurs". Ce dernier sera développé en PHP/Symfony.<br>Bonne visite à tous! </p>
              
                </section>

            </div>

        </div>

    </div>
			
</div>
	
<?php  $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    	

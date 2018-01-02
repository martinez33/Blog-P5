<?php $title='Mon blog'; ?>
    
<?php ob_start() ?>	




<div class="container">

    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">

          	<div class="blog-post">
	          	<?php
	          	//var_dump($homePosts);
				foreach ($posts as $post) :
				{
				?>

		            <h2 class="blog-post-title post-title"><?= $post->getTitle() ?></h2>
		            <p class="blog-post-meta">Création le : <?= $post->getCreationDate() ?></p>
					<h4><?= $post->getChapo(); ?></h4>
		            <p>
                  <?= $post->getExtContent(); ?>
		              <a href="index.php?action=post&id=<?=$post->getId()?>">Voir la suite</a>
                </p>
                
                <hr />
	            <?php
				}
				endforeach;
				?>
         	</div><!-- /.blog-post -->

         	
		</div>


		<div class="col-lg-4 col-md-2col-sm-3 blog-sidebar">
          	<div class="sidebar-module sidebar-module-inset">
            	<h4>À propos de moi</h4>
            	<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          	</div>
          	<div class="sidebar-module">
	            <h4>Archives</h4>
	            <ol class="list-unstyled">
	            
				    <li><a href="#">Fevrier 2018</a></li>
				    <li><a href="#">Janvier 2018</a></li>
				    <li><a href="#">December 2017</a></li>
				    <li><a href="#">November 2017</a></li>
				    <li><a href="#">October 2017</a></li>    
			              
			    </ol>
          	</div>
          	<div class="sidebar-module">
            	<h4>Elsewhere</h4>
            	<ol class="list-unstyled">
              		<li><a href="#">GitHub</a></li>
              		<li><a href="#">Twitter</a></li>
              		<li><a href="#">Facebook</a></li>
            	</ol>
         	</div>
        </div><!-- /.blog-sidebar -->

    </div>


    <div class="row">
        <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      
        <section class="col-lg-4" id="cv">

            	<a href="#"><h3>Mon CV</h3><img src="public/images/iconCv.png" alt="" /></a>

              
        </section>
      </div>
    </div>
  </div>
			
</div>
	
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    	

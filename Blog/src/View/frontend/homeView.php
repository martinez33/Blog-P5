<?php $title='Mon blog'; ?>
    
<?php ob_start() ?>	




<div class="container">

    <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">

          	<div class="blog-post">
	          	<?php
      				foreach ($posts as $post) :
      				{
      				?>

      		      <h2 class="blog-post-title post-title"><?= $post->getTitle() ?></h2>

                      
      					<h4><?= $post->getChapo(); ?></h4>
      		      <p>
                  <?= $post->getExtContent(); ?>
      		        <button type="submit" class="btn btn-primary btn-xs" style="border-radius: 10px;" ><a href="/Blog-p5/Blog/posts/<?=$post->getId()?>">Voir la suite</a></button>  
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
      <div class="row" >
        <div class="col-lg-8 col-md-10 mx-auto" style="border: 1px solid black; background-color: #343a40; border-radius: 10px; ">
          <p style="color: #868e96;">Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form method="post" action="/Blog-p5/blog/sendMail" name="" id="contactForm" novalidate >
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required data-validation-required-message="Please enter your name."/><!--input type="text" name="name"  id="name" -->
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
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
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      
        <section class="col-lg-4" id="cv">

            	<a href="src/public/CV_martin_forestier.pdf"><h3>Mon CV</h3><img src="src/public/images/iconCv.png" alt="" /></a>

              
        </section>
      </div>
    </div>
  </div>
			
</div>
	
<?php  $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    	

<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

<div class="container">

	<div class="row">
			
		<div class="col-lg-12 col-md-12 mx-auto" style="border: 1px solid #343a40; background-color: #343a40; border-radius: 10px;">

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

	</div>

</div>

<?php $content = ob_get_clean() ; ?>

<?php require('template.php'); ?>
<?php 


namespace App\Controler;
ini_set('display_errors', 'on');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './vendor/autoload.php';

class MailControler {




	public function __invoke() //sendMail
	{
	

		try{

				$val = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
			if(!empty($_POST['lastName']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){

				if($val != false){

					try{
							$name = $_POST['name'];
							$lastName = $_POST['lastName'];
							$emailAdress = $_POST['email'];
							$message = $_POST['message'];
						 //echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; 	
							$mail = new PHPMailer();
						//	var_dump($mail);
							$mail->IsSMTP();
							$mail->SMTPDebug = 0;
							$mail->SMTPAuth = true;
							$mail->SMTPSecure = 'tls';
		
							$mail->Host ='smtp.gmail.com';
						
						       	$mail->Port ='587';
							$mail->Username = 'martinez.forestier@gmail.com';
							$mail->Password = 'moderohihikvog4oj4';
						

							

							$mail->setFrom($emailAdress, $name);
							$mail->addAddress('martinez.forestier@gmail.com', 'Martin');
							$mail->Subject  = 'Prise de contact depuis le blog';
							$mail->Body     = 'Message envoyé par : ' .$emailAdress. ' Contenu : '. $message;
							if(!$mail->send()) {
  								echo 'Message was not sent.';
								  echo 'Mailer error: ' . $mail->ErrorInfo;
							} else {
  								
							throw new \Exception ('Message envoyé !');
						}

					}
					catch(\Exception $e){

					    $errorMessage = $e->getMessage();
					    require('src/View/frontend/successView.php');
					}
				}
				else{
					throw new \Exception('L\'adress Mail n\'est pas valide !');
				}	
			}
			else{

				throw new \Exception('Tous les champs ne sont pas remplis !');
			}
		}
		catch(\Exception $e){

	      	$errorMessage = $e->getMessage();
	      	require('src/View/frontend/errorView.php');
		}
	}


}

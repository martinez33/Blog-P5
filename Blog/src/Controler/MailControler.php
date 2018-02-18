<?php 

namespace App\Controler;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailControler 
{

	private $idTab;


    public function __invoke() //sendMail
	{
		
		$this->idTab = 	require __DIR__.'./../../config/mailId.php';
		
        try {

			$val = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);

			if(!empty($_POST['lastName']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

				if($val != false) {

					try {

						$name = $_POST['name'];
						$lastName = $_POST['lastName'];
						$emailAdress = $_POST['email'];
						$message = $_POST['message'];
						  	
						$mail = new PHPMailer();
						
						$mail->IsSMTP();
						$mail->SMTPDebug = 0;
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = 'tls';
		
						$mail->Host ='smtp.gmail.com';
						
						$mail->Port ='587';
						$mail->Username = $this->idTab['username'];
						$mail->Password = $this->idTab['psswd'];
						

							

						$mail->setFrom($emailAdress, $name);
						$mail->addAddress('martinforestier.contact@gmail.com', 'Martin');
						$mail->Subject  = 'Prise de contact depuis le blog';
						$mail->Body     = 'Message envoyé par : ' .$emailAdress. ' Contenu : '. $message;

						if(!$mail->send()) {

  							echo 'Message was not sent.';
							echo 'Mailer error: ' . $mail->ErrorInfo;

						} else {
  								
							throw new \Exception ('Message envoyé !');

						}

					} catch(\Exception $e) {

					    $errorMessage = $e->getMessage();

					    require('../src/View/frontend/successView.php');

					}

				} else {

					throw new \Exception('L\'adress Mail n\'est pas valide !');

				}	

			} else {

				throw new \Exception('Tous les champs ne sont pas remplis !');

			}

		} catch(\Exception $e) {

	      	$errorMessage = $e->getMessage();

	      	require('../src/View/frontend/errorView.php');

		}

	}

}

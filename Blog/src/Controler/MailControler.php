<?php 


namespace App\Controler;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './vendor/autoload.php';

class MailControler {


private $name;
private $emailAdress;
private $message;







	public function __invoke() //sendMail
	{




		try{

				$val = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
			if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])){

				if($val != false){

					try{
						   // Création d'un nouvel objet $mail
							$mail = new PHPMailer();
							// Encodage
							$mail->CharSet = 'UTF-8';
							$mail->Username = 'martinez.forestier@gmail.com';
							$mail->Password = 'rohihikvog4oj4';
							// Corp de notre email
							$body = $_POST['message'];
							// Expediteur, adresse de retour et destinataire :
							$mail->SetFrom($_POST['email'], $_POST['name']);
							$mail->AddReplyTo($_POST['email'], $_POST['name']);
							$mail->AddAddress("martinez.forestier@gmail.com", "Martin");
							// Sujet du mail
							$mail->Subject = "Test d'envoi de mail avec PHPMailer";
							// Le message
							$mail->MsgHTML($body);
							// Pièce jointe
							//$mail->AddAttachment("images/phpmailer.gif");
							// Envoi de l'email


							$mail->send();
							throw new \Exception ('Message envoyé !');

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
<?php

namespace Market\SymfonyBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MailController extends Controller
{
	public function mailSend($mail, $message, $name)
	{
		$to      = 'ad9bis@gmail.com';
		$subject = 'Wiadomość wysłana przez formularz - Terminy giełd';
		$message = $message;
		$headers = 'From: '.$name . "\r\n" .
    		'Reply-To: .'$name . "\r\n" .
    		'X-Mailer: PHP/' . phpversion();
		if(mail($to, $subject, $message, $headers))
		{
			$result='Email został poprawnie wysłany!';
		}else{
			$result='Problem z wysłaniem maila! Przykro nam.';
		}
		return $result;
	}
}

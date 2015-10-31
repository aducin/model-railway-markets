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
		$subject = $name .'- Wiadomość wysłana przez formularz - Terminy giełd';
		$message = htmlspecialchars($message, ENT_COMPAT, 'UTF-8');;
		$headers = "Reply-to: ".$name."<ad9bis@gmail.pl>".PHP_EOL;
   		$headers .= "From: ".$mail.PHP_EOL;
  		$headers .= "MIME-Version: 1.0".PHP_EOL;
  		$headers .= "Content-type: text/html; charset=utf-8".PHP_EOL; 
		if(mail($to, $subject, $message, $headers))
		{
			$result='Email został poprawnie wysłany!';
		}else{
			$result='Problem z wysłaniem maila! Przykro nam.';
		}
		return $result;
	}
}

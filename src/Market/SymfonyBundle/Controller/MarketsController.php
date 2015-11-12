<?php

namespace Market\SymfonyBundle\Controller;

Use Market\SymfonyBundle\Entity\Addresses;
use Symfony\Component\Validator\Constraints\Date;
use Market\SymfonyBundle\Entity\Bookmark;
use Market\SymfonyBundle\Entity\Dates;
use Market\SymfonyBundle\Entity\DatesRepository;
use Market\SymfonyBundle\Entity\Markets;
use Market\SymfonyBundle\Entity\MarketsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class MarketsController extends Controller
{
	public function showMarketAction($seekedMarket, Request $request)
	{
		$firstPage=null;
		$mailResult=null;
		if(isset($_POST['nameText']) AND (isset($_POST['emailText']) AND (isset($_POST['messageText'])))){
			if($_POST['nameText']!=null AND $_POST['emailText']!=null)
			{
				$notification = new MailController();
				$mailResult=$notification->mailSend($_POST['emailText'], $_POST['messageText'], $_POST['nameText']);
			}
		}
		$em = $this->getDoctrine()->getManager();
		$bookmarks = $em->getRepository('MarketSymfonyBundle:Bookmark')->findAll();
		$finalBookmarkName[]=array('path'=>'homepage');
		foreach($bookmarks as $bookmark)
		{
			$finalBookmarkName[]=array('path'=>$bookmark->getBookmarkName());
		}
		$finalBookmarkName[]=array('path'=>'e-market');

		$mailPrepare = new Addresses();
		$form = $this->createFormBuilder($mailPrepare)
       	    ->add('nameText', 'text', array(
  		    'attr' => array('class' => 'label')))
       	    ->add('email', 'text', array(
            'attr' => array('class' => 'email')))
       	    ->add('message', 'textarea', array(
            'attr' => array('class' => 'message')))
         	->add('save', 'submit', array('label' => 'Wyślij', 'disabled' => true, 'attr'  => array('class' => 'submitButton')))
            ->getForm();
 
       	$form->handleRequest($request);

       	if ($form->isValid()) {
       		$name=$form->getData()->getNameText();
       		$mail=$form->getData()->getEmail();
       		$message=$form->getData()->getMessage();
			$mailResult=$mailPrepare->mailSend($name, $mail, $message);	
    	}

		if($seekedMarket=='homepage' OR $seekedMarket=='e-market'){
			$template=array(
				'firstPage'=>$firstPage,
				'notification'=> $mailResult,
				'path'=>$seekedMarket,
				'url'=>$finalBookmarkName
				);

			return $this->render('MarketSymfonyBundle:Markets:'.$seekedMarket.'.html.twig', 
			array('template'=>$template, 'form' => $form->createView()));
		}else{
			$schedule = array();
			$singleBookmark = $em->getRepository('MarketSymfonyBundle:Bookmark')->findOneByBookmarkName($seekedMarket);
			$singleBookmarkId=$singleBookmark->getId();
			$singleBookmark=$singleBookmark->getBookmarkName();

			$markets = $em->getRepository('MarketSymfonyBundle:Markets')->findAllDatesSelectedMarket($singleBookmarkId);

			foreach($markets as $market)
			{
				$dates = $em->getRepository('MarketSymfonyBundle:Dates')->findAllDatesCurrentDate($market, 1);
				$nextDate = $em->getRepository('MarketSymfonyBundle:Dates')->findFirstMarketDate($market);
				if($nextDate!='noResult'){
					$nextDateFormat=date_format($nextDate[0]->getMarketDate(), 'Y-m-d');
				}else{
					$nextDateFormat='Obecnie brak kolejnego terminu.';
				}
				$count=0;
				foreach($dates as $date)
				{
					$schedule[]=date_format($date->getMarketDate(), 'Y-m-d');
					$count++;
				}
				$finalIfnormation[]=array(
					'name'=>$market->getMarketCity(), 
					'address'=>$market->getAddress(), 
					'contact'=>$market->getContact(), 
					'hours'=>$market->getHours(), 
					'nextDate'=>$nextDateFormat, 
					'schedule'=>$schedule, 
					'count'=>$count
					);
				$schedule=null;
			}
			$template=array(
				'firstPage'=>$firstPage,
				'market'=>$finalIfnormation,
				'notification'=> $mailResult, 
				'path'=>$singleBookmark,
				'url'=>$finalBookmarkName
			);

			return $this->render('MarketSymfonyBundle:Markets:markets.html.twig', 
			array('template'=>$template, 'form' => $form->createView()));
		}
	}

	public function showHomepageAction(Request $request)
	{
		$mailResult=null;
		$em = $this->getDoctrine()->getManager();
		$bookmarks = $em->getRepository('MarketSymfonyBundle:Bookmark')->findAll();
		$finalBookmarkName[]=array('path'=>'homepage');
		foreach($bookmarks as $bookmark)
		{
			$finalBookmarkName[]=array('path'=>$bookmark->getBookmarkName());
		}
		$finalBookmarkName[]=array('path'=>'e-market');
		$template=array(
			'firstPage'=>'firstPage',
			'notification'=> $mailResult, 
			'path'=>'homepage',
			'url'=>$finalBookmarkName
		);

		$mailPrepare = new Addresses();
		$form = $this->createFormBuilder($mailPrepare)
            ->add('nameText', 'text')
            ->add('email', 'text')
            ->add('message', 'text')
            ->add('save', 'submit', array('label' => 'Wyślij', 'disabled' => true))
            ->getForm();
 
        $form->handleRequest($request);
		return $this->render('MarketSymfonyBundle:Markets:homepage.html.twig', 
		array('template'=>$template, 'form' => $form->createView()));
	}
}


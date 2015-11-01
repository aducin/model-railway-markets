<?php

namespace Market\SymfonyBundle\Controller;

use Symfony\Component\Validator\Constraints\Date;
use Market\SymfonyBundle\Entity\Bookmark;
use Market\SymfonyBundle\Entity\Dates;
use Market\SymfonyBundle\Entity\DatesRepository;
use Market\SymfonyBundle\Entity\Markets;
use Market\SymfonyBundle\Entity\MarketsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;


class MarketsController extends Controller
{
	public function showMarketAction($seekedMarket)
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

		if($seekedMarket=='homepage' OR $seekedMarket=='e-market'){
			$template=array(
				'firstPage'=>$firstPage,
				'notification'=> $mailResult,
				'path'=>$seekedMarket,
				'url'=>$finalBookmarkName
				);
			return $this->render('MarketSymfonyBundle:Markets:'.$seekedMarket.'.html.twig', $template);
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
			return $this->render('MarketSymfonyBundle:Markets:markets.html.twig', $template);
		}
	}

	public function showHomepageAction()
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
		return $this->render('MarketSymfonyBundle:Markets:homepage.html.twig', $template);
	}
}

/*database_host:     127.0.0.1
    database_port:     ~
    database_name:     symfony
    database_user:     root
    database_password: ~
    */

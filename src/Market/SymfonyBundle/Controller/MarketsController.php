<?php

namespace Market\SymfonyBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class MarketsController extends Controller
{
	public function getBookmarks(){
		$url=array('homepage', 'services', 'rates' , 'about', 'blog', 'contact');
		foreach($url as $page) {
			$allURLsGen[] = array('name'=>$page, 'path'=>$this->generateUrl('markets_index', array('path' => $page)));
    		}
		return $allURLsGen;
	}
	/**
 	* @Route("/", defaults={"path" = "homepage"})
 	* @Route("/{path}")
 	*/
	public function indexAction($path)
	{
		return $this->render('MarketSymfonyBundle:Markets:'.$path.'.html.twig', array(
			'path' => $path, 'url'=>$this->getBookmarks()
			));
	}
}

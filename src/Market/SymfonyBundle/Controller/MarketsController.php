<?php

namespace Market\SymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MarketsController extends Controller
{
    public function indexAction($path)
    {
    	$twigPath='MarketSymfonyBundle:Markets:'.$path.'.html.twig';
        return $this->render($twigPath, array(
            'path' => $path,
        ));
    }

}
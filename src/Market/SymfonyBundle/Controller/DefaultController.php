<?php

namespace Market\SymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Market\SymfonyBundle\Entity\Addresses;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MarketSymfonyBundle:Default:index.html.twig', array('name' => $name));
    }

    public function newAction(Request $request)
    {
    	$address = new Addresses();

        if(!isset($_POST['form']['name'])){
        	$address->setName('Write a blog post');
        	$address->setDescription('Write a blog description');
    	}

        $form = $this->createFormBuilder($address)
            ->add('name', 'text')
            ->add('description', 'text')
            ->add('save', 'submit')
            ->add('saveAndAdd', 'submit')
            ->getForm();
        if(isset($_POST['form']['name'])){
        	$address->setName($_POST['form']['name']);
        	$address->setDescription($_POST['form']['description']);

        	$em = $this->getDoctrine()->getManager();

        	//$em->persist($address);
			//$em->flush();
        }

        $form->handleRequest($request);

        if ($form->isValid()) {

        	$nextAction = $form->get('saveAndAdd')->isClicked()
        	//var_dump($nextAction);exit();
            ? 'You have pressed the "saveAndAdd" button!'
            : '"Save" button has been pressed!';var_dump($nextAction);exit();

        return $this->render('MarketSymfonyBundle:Default:index.html.twig', array('name' => 'Task succeeded!'));exit();
    }

        return $this->render('MarketSymfonyBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

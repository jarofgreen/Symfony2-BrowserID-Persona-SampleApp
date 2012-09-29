<?php

namespace JarOfGreen\BrowserIDBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	
    public function loginAction()
    {
        return $this->render('JarOfGreenBrowserIDBundle:Default:login.html.twig', array());
    }

	public function logoutAction()
    {
        return $this->render('JarOfGreenBrowserIDBundle:Default:logout.html.twig', array());
    }

	
}

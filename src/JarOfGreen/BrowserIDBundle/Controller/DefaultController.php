<?php

namespace JarOfGreen\BrowserIDBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JarOfGreenBrowserIDBundle:Default:index.html.twig', array('name' => $name));
    }
}

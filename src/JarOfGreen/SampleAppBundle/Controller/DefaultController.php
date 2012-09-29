<?php

namespace JarOfGreen\SampleAppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JarOfGreenSampleAppBundle:Default:index.html.twig', array('name' => $name));
    }
}

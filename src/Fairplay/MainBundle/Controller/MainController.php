<?php

namespace Fairplay\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FairplayMainBundle:Main:index.html.twig');
    }
}

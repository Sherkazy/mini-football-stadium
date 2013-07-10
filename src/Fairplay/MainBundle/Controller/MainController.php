<?php

namespace Fairplay\MainBundle\Controller;

use Fairplay\MainBundle\Entity\District;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('FairplayMainBundle:Main:index.html.twig');
    }

    public function searchBarAction()
    {
        $districts = $this->getDoctrine()->getRepository('FairplayMainBundle:District')->findAll();
        /*var_dump($districts);die();*/
        return $this->render('FairplayMainBundle:Main:_search_form.html.twig',array('districts'=>$districts));
    }
}

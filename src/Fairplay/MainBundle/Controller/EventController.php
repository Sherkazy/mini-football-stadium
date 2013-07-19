<?php
/**
 * Created by JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 18.07.2013
 * Time: 11:09
 * To change this template use File | Settings | File Templates.
 */
namespace Fairplay\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function createEventAction($id, Request $request)
    {
        $start = $request->request->get('start');
        $end = $request->request->get('end');
        return $this->render('FairplayMainBundle:Event:create.html.twig',array('start'=>$start,'end'=>$end,'id'=>$id));
    }
}
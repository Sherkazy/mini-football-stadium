<?php
/**
 * Created by JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 15.07.2013
 * Time: 11:25
 * To change this template use File | Settings | File Templates.
 */
namespace Fairplay\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function ratingAction($score,$id)
    {
       $response = $this->getDoctrine()->getRepository('FairplayMainBundle:Stadium')->updateRating($id,$score);
        return new JsonResponse($response,200);
    }

    public function loadEventAction($id)
    {
        $start = $this->getRequest()->query->get('start');
        $end = $this->getRequest()->query->get('end');

        $serializer = $this->container->get('jms_serializer');
        $events = $this->getDoctrine()->getRepository('FairplayMainBundle:Event')->findByStadium($id);
        $events_json = $serializer->serialize($events,'json');
        return new Response($events_json);
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 18.07.2013
 * Time: 11:09
 * To change this template use File | Settings | File Templates.
 */
namespace Fairplay\MainBundle\Controller;

use Fairplay\MainBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function createEventAction($id, Request $request)
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        /*var_dump($user);die();*/

        $start = $request->request->get('start');
        $end = $request->request->get('end');

        $start = \DateTime::createFromFormat('D M d Y H:i:s e+', $start);
        $end = \DateTime::createFromFormat('D M d Y H:i:s e+', $end);

        $stadium = $this->getDoctrine()->getRepository('FairplayMainBundle:Stadium')->find($id);

        $event = new Event();
        $event->setStadium($stadium);

        $event->setAllDay(false);
        $event->setStart($start);
        $event->setEnd($end);
        $event->setEditable(false);
        $event->setTitle($user->getFirstname());

        $entity_manager = $this->getDoctrine()->getManager();
        $entity_manager->persist($event);
        $entity_manager->flush();

        $start = $start->format('d-m-y H:i:s');
        $end = $end->format('d-m-y H:i:s');

        return $this->render('FairplayMainBundle:Event:create.html.twig',array('start'=>$start,'end'=>$end,'stadium'=>$stadium));
    }
}
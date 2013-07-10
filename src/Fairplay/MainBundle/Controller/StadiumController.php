<?php
/**
 * Created by JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 10.07.2013
 * Time: 14:57
 * To change this template use File | Settings | File Templates.
 */
namespace Fairplay\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StadiumController extends Controller
{
    public function searchAction(Request $request)
    {

        $district_id = $request->request->get('district');

        /*var_dump($request->request->get('district'));die($request->request->get('district'));*/

        $stadiums = $this->getDoctrine()->getRepository('FairplayMainBundle:Stadium')->findByDistrict($district_id);

        return $this->render('FairplayMainBundle:Stadium:stadiums.html.twig',array('stadiums'=>$stadiums));
    }

}
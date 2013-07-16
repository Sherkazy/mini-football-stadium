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

class AjaxController extends Controller
{
    public function ratingAction($score,$id)
    {
       $response = $this->getDoctrine()->getRepository('FairplayMainBundle:Stadium')->updateRating($id,$score);
        return new JsonResponse($response,200);
    }
}
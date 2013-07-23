<?php
/**
 * Created by JetBrains PhpStorm.
 * User: BİLGİ İŞLEM
 * Date: 23.07.2013
 * Time: 12:37
 * To change this template use File | Settings | File Templates.
 */
namespace Fairplay\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ivory\GoogleMap\Events\MouseEvent;
use Ivory\GoogleMap\Map;
use Ivory\GoogleMap\MapTypeId;
use Ivory\GoogleMap\Overlays\Marker;
use Ivory\GoogleMap\Overlays\InfoWindow;

class MapController extends Controller
{
    public function showAction($id=0)
    {
        $clickable = false;
        if($id==0){
            $markers = $this->getDoctrine()->getRepository('FairplayMainBundle:Marker')->findAll();
            $clickable = true;
        }
        else{
            $markers = $this->getDoctrine()->getRepository('FairplayMainBundle:Marker')->findByStadium($id);
        }

        $map = new Map();
        $map->setPrefixJavascriptVariable('map_');
        $map->setHtmlContainerId('map_canvas');
        $map->setAsync(true);
        $map->setAutoZoom(false);
        $map->setMapOptions(array('mapTypeId'=>MapTypeId::ROADMAP,'zoom'=>12));
        $map->setCenter(42.864541,74.594727, true);
        $map->setStylesheetOptions(array('width'=>'960px','height'=>'500px'));
        $map->setLanguage('ru');

        foreach($markers as $m){

            $route = $this->get('router')->generate('fairplay_stadium_info',array('id'=>$m->getStadium()->getId()));
            $stadiumName = $m->getStadium()->getName();

            $infoWindow = new InfoWindow();
            $infoWindow->setPrefixJavascriptVariable('info_window_');
            $infoWindow->setPosition(0, 0, true);
            $infoWindow->setPixelOffset(1.1, 2.1, 'px', 'pt');
            $infoWindow->setContent("<p>Перейти к <a href=$route>$stadiumName</p>");
            $infoWindow->setOpen(false);
            $infoWindow->setAutoOpen(true);
            $infoWindow->setOpenEvent(MouseEvent::CLICK);
            $infoWindow->setAutoClose(false);
            $infoWindow->setOption('disableAutoPan', true);
            $infoWindow->setOption('zIndex', 10);
            $infoWindow->setOptions(array(
                'disableAutoPan' => true,
                'zIndex'         => 10,
            ));

            $marker = new Marker();
            $marker->setPosition($m->getLatitude(),$m->getLongitude(),true);
            $marker->setOptions(array('url'=>'www.google.com','clickable'=>$clickable,'title'=>$m->getStadium()->getName()));
            $marker->setIcon('http://maps.gstatic.com/mapfiles/markers/marker.png');
            $marker->setInfoWindow($infoWindow);
            $map->addMarker($marker);


        }
        return $this->render('FairplayMainBundle:Map:show.html.twig',array('map'=>$map));

    }
}
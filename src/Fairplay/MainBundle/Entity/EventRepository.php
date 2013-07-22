<?php

namespace Fairplay\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{
    public function getEvents($start,$end)
    {
        $start = gmdate('Y-m-d\TH:i:s\Z',$start);
        $end - gmdate('Y-m-d H:i:s',$end);

        $query = $this->createQueryBuilder('events')
            ->select('u')
            ->from('FairplayMainBundle:Event','u')
            ->where('u.start >= :start')
            ->andWhere('u.end <= :end')
            ->setParameter('start',$start)
            ->setParameter('end',$end)->getQuery();
            return array($query->getResult());
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: nursultan
 * Date: 2/17/14
 * Time: 7:11 PM
 */

namespace Fairplay\MainBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fairplay\MainBundle\Entity\Facility;

class LoadFacilityData extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $facilities = array('Интернет', 'Униформа', 'Душ');
        foreach($facilities as $name){
            $facility = new Facility();
            $facility->setName($name);
            $manager->persist($facility);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}